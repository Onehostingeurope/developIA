import re

with open('contact/index.html', 'r', encoding='utf-8') as f:
    text = f.read()

# Fix placeholder containing a span tag
text = re.sub(r'placeholder="<span data-i18n="[^"]+">([^<]+)</span>"', r'placeholder="\1"', text)

with open('contact/index.html', 'w', encoding='utf-8') as f:
    f.write(text)
