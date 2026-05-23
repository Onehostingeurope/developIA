with open('index.html', 'r', encoding='utf-8') as f:
    text = f.read()

import re
# We need to find the <img tag with DevelopIA &mdash; inside it and fix it
text = re.sub(r'alt="<span data-i18n="index\.hero_title_1">DevelopIA &mdash;</span> Build your digital vision fast"', 'alt="DevelopIA &mdash; Build your digital vision fast"', text)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(text)
