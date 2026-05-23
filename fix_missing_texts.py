import re

# 1. Update index.html
with open('index.html', 'r', encoding='utf-8') as f:
    html = f.read()

# Replace "We Design & Build"
html = html.replace('>We Design & Build<', ' data-i18n="index.proc_2_alt">We Design &amp; Build<')
# Replace "You Launch & Grow"
html = html.replace('>You Launch & Grow<', ' data-i18n="index.proc_3_alt">You Launch &amp; Grow<')
# Replace "Projects We've Built"
html = html.replace(">Projects We've Built<", ' data-i18n="index.port_title_alt">Projects We&#39;ve Built<')

# Replace the text with <strong> tags
target_why_sub = 'DevelopIA combines <strong class="text-on-surface">creativity</strong>, <strong class="text-on-surface">software engineering</strong>, <strong class="text-on-surface">automation</strong>, and <strong class="text-on-surface">business strategy</strong> to create digital products that are modern, scalable, and ready for growth.'
html = html.replace(target_why_sub, f'<span data-i18n="index.why_sub_alt">{target_why_sub}</span>')

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(html)

# 2. Update i18n.ts to include the <strong> tags in why_sub_alt
with open('i18n.ts', 'r', encoding='utf-8') as f:
    ts = f.read()

def replace_why_sub(lang, orig_text, new_text):
    global ts
    # Need to find the exact line in i18n.ts. The text might be slightly different.
    # It's easier to just use regex to replace the value of why_sub_alt for each language
    pat = r'(why_sub_alt:\s*")([^"]+)(")'
    
    # We need to target specific language blocks.
    # Actually, the user complained it's not translated.
    # Wait, the translation IN i18n.ts doesn't have the <strong> tags, so if we inject it as a span, 
    # the vue-i18n will inject the translation which DOES NOT have <strong> tags, thus losing the bold formatting.
    # Let's update the translations in i18n.ts to include the <strong> tags.
    pass

# Update i18n.ts why_sub_alt for all 5 languages
ts = re.sub(
    r'(why_sub_alt:\s*")[^"]+(")',
    lambda m: m.group(1) + 'DevelopIA combines <strong class=\\"text-on-surface\\">creativity</strong>, <strong class=\\"text-on-surface\\">software engineering</strong>, <strong class=\\"text-on-surface\\">automation</strong>, and <strong class=\\"text-on-surface\\">business strategy</strong> to create digital products that are modern, scalable, and ready for growth.' + m.group(2) if 'DevelopIA combines' in m.string[m.start():m.end()] else m.group(0),
    ts, count=1
)

# For French
ts = re.sub(
    r'(why_sub_alt:\s*")DevelopIA combine créativité, ingénierie, automatisation et stratégie pour créer des produits numériques modernes\.(")',
    r'\1DevelopIA combine <strong class=\"text-on-surface\">créativité</strong>, <strong class=\"text-on-surface\">ingénierie logicielle</strong>, <strong class=\"text-on-surface\">automatisation</strong> et <strong class=\"text-on-surface\">stratégie d\'entreprise</strong> pour créer des produits numériques modernes, évolutifs et prêts pour la croissance.\2',
    ts
)

# For Spanish
ts = re.sub(
    r'(why_sub_alt:\s*")DevelopIA combina creatividad, ingeniería, automatización y estrategia para crear productos digitales modernos\.(")',
    r'\1DevelopIA combina <strong class=\"text-on-surface\">creatividad</strong>, <strong class=\"text-on-surface\">ingeniería de software</strong>, <strong class=\"text-on-surface\">automatización</strong> y <strong class=\"text-on-surface\">estrategia empresarial</strong> para crear productos digitales que son modernos, escalables y listos para el crecimiento.\2',
    ts
)

# For Italian
ts = re.sub(
    r'(why_sub_alt:\s*")DevelopIA combina creatività, ingegneria, automazione e strategia per creare prodotti digitali moderni\.(")',
    r'\1DevelopIA combina <strong class=\"text-on-surface\">creatività</strong>, <strong class=\"text-on-surface\">ingegneria del software</strong>, <strong class=\"text-on-surface\">automazione</strong> e <strong class=\"text-on-surface\">strategia aziendale</strong> per creare prodotti digitali moderni, scalabili e pronti per la crescita.\2',
    ts
)

# For Russian
ts = re.sub(
    r'(why_sub_alt:\s*")DevelopIA объединяет креативность, инженерию, автоматизацию и стратегию для создания современных цифровых продуктов\.(")',
    r'\1DevelopIA объединяет <strong class=\"text-on-surface\">креативность</strong>, <strong class=\"text-on-surface\">программную инженерию</strong>, <strong class=\"text-on-surface\">автоматизацию</strong> и <strong class=\"text-on-surface\">бизнес-стратегию</strong> для создания цифровых продуктов, которые современны, масштабируемы и готовы к росту.\2',
    ts
)

with open('i18n.ts', 'w', encoding='utf-8') as f:
    f.write(ts)
