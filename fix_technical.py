import re

with open('i18n.ts', 'r', encoding='utf-8') as f:
    text = f.read()

# I will replace `proc_title_alt: "...",` with `proc_title_pt1: "...", proc_title_pt2: "...",` in all languages.

replacements = [
    (r'proc_title_alt:\s*"You Don&#39;t Need to Be Technical\.",', 'proc_title_pt1: "You Don\'t Need to Be",\n      proc_title_pt2: "Technical.",'),
    (r'proc_title_alt:\s*"Pas Besoin d&#39;Être Technique\.",', 'proc_title_pt1: "Pas Besoin d\'Être",\n      proc_title_pt2: "Technique.",'),
    (r'proc_title_alt:\s*"No Necesitas Ser Técnico\.",', 'proc_title_pt1: "No Necesitas Ser",\n      proc_title_pt2: "Técnico.",'),
    (r'proc_title_alt:\s*"Non Devi Essere Tecnico\.",', 'proc_title_pt1: "Non Devi Essere",\n      proc_title_pt2: "Tecnico.",'),
    (r'proc_title_alt:\s*"Вам не нужно быть технарем\.",', 'proc_title_pt1: "Вам не нужно быть",\n      proc_title_pt2: "технарем.",'),
    # Note: my script might have slightly different casing for Russian, let's use a generic substitution for all of them
]

for pat, repl in replacements:
    text = re.sub(pat, repl, text, flags=re.IGNORECASE)

# In case some didn't match exactly, I'll also just add them right below proc_title_alt
def fallback_add(lang_block, pt1, pt2):
    # This is a bit complex, let's just use string replace on the exact known keys
    pass

with open('i18n.ts', 'w', encoding='utf-8') as f:
    f.write(text)
