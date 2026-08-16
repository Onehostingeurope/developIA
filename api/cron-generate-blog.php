<?php
/**
 * DevelopIA - Automated AI Blog Generator Cron Endpoint
 */

header('Content-Type: application/json');
require_once __DIR__ . '/../db.php';

$settingsFile = __DIR__ . '/../settings.json';
$settings = [];
if (file_exists($settingsFile)) {
    $settings = json_decode(file_get_contents($settingsFile), true) ?: [];
}

$allowedToken = $settings['cron_token'] ?? 'developia_secure_token_2026';
$passedToken = $_GET['token'] ?? '';

if (empty($passedToken) || $passedToken !== $allowedToken) {
    http_response_code(403);
    echo json_encode(['error' => 'Access Denied: Invalid cron token.']);
    exit;
}

$apiKey = $settings['gemini_api_key'] ?? '';
if (empty($apiKey)) {
    http_response_code(400);
    echo json_encode(['error' => 'Failed: Gemini API key is missing. Configure it in CMS Settings.']);
    exit;
}

// Topics list
$topics = [
    "Building Scalable SaaS Platforms with PHP & Vue",
    "How to Integrate LLM Agents into Enterprise Workflows",
    "Vector Databases and Semantic Search: A Developer's Guide",
    "Optimizing Web App Performance and Speed (Under 100ms Load Times)",
    "Fine-Tuning Open Source LLMs for Custom Domain Knowledge",
    "Automating Manual Business Workflows using Zapier, Make, and Custom APIs",
    "Designing Tech-Minimalist Premium User Interfaces (UI/UX)",
    "Serverless Architecture vs. Dedicated Hosting: What's Best for SaaS?",
    "Building a Real-Time Notification System with WebSockets",
    "Security Best Practices for Custom Web App Development"
];

// Pick random topic
$selectedTopic = $topics[array_rand($topics)];

$prompt = "Write a comprehensive, professional blog post in HTML format.
Topic: {$selectedTopic}
Tone: Premium, tech-minimalist, authoritative, software engineer.
Requirements:
1. Return a JSON object with exactly three keys:
   - \"title\": A catchy, professional title for the post.
   - \"summary\": A brief, engaging one-paragraph summary of the article.
   - \"content\": The body of the article in clean HTML (using tags like <p>, <h2>, <h3>, <ul>, <li>, and <pre><code> for code examples).
2. Do not include markdown formatting or backticks outside the JSON. Return raw JSON string only.
3. Keep the content detailed, explaining technical implementations or best practices.";

// Gemini API Call
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . urlencode($apiKey);

$payload = [
    'contents' => [
        [
            'parts' => [
                ['text' => $prompt]
            ]
        ]
    ],
    'generationConfig' => [
        'responseMimeType' => 'application/json'
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200) {
    http_response_code(502);
    echo json_encode([
        'error' => 'Gemini API call failed',
        'http_code' => $httpCode,
        'response' => json_decode($response, true) ?: $response
    ]);
    exit;
}

$result = json_decode($response, true);
$rawText = $result['candidates'][0]['content']['parts'][0]['text'] ?? '';

if (empty($rawText)) {
    http_response_code(500);
    echo json_encode(['error' => 'Empty text returned from Gemini API.']);
    exit;
}

$articleData = json_decode($rawText, true);
if (!$articleData || empty($articleData['title']) || empty($articleData['content'])) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to parse JSON article data from Gemini output.', 'raw_text' => $rawText]);
    exit;
}

// Generate Slug
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $articleData['title'])));
$slug = trim($slug, '-');

// Select random cover image
$images = ['developia_hero.jpg', 'easydubbing.jpg', 'tunemusics.png', 'social_ai_publisher.png'];
$randomImage = $images[array_rand($images)];

$pdo = getDBConnection();
if (!$pdo) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed.']);
    exit;
}

try {
    // Check if slug exists
    $stmt = $pdo->prepare("SELECT id FROM `blog_posts` WHERE `slug` = :slug LIMIT 1");
    $stmt->execute([':slug' => $slug]);
    if ($stmt->fetch()) {
        // Append random string to slug to make it unique
        $slug .= '-' . rand(100, 999);
    }
    
    $stmt = $pdo->prepare("INSERT INTO `blog_posts` (`title`, `slug`, `content`, `summary`, `image_url`, `status`, `published_at`) VALUES (:title, :slug, :content, :summary, :image_url, 'published', NOW())");
    $stmt->execute([
        ':title' => $articleData['title'],
        ':slug' => $slug,
        ':content' => $articleData['content'],
        ':summary' => $articleData['summary'] ?? '',
        ':image_url' => $randomImage
    ]);
    
    echo json_encode([
        'success' => true,
        'message' => 'Blog post generated and published successfully!',
        'title' => $articleData['title'],
        'slug' => $slug
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database insert failed: ' . $e->getMessage()]);
}
