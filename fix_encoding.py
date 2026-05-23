import re

# Fix the remaining corrupted characters in index.html
with open('index.html', 'rb') as f:
    raw = f.read()

text = raw.decode('utf-8', errors='replace')

# Fix the Russian dropdown line — replace corrupted Russian with "Русский" as HTML entities
# Unicode codepoints for Русский: Р(1056) у(1091) с(1089) с(1089) к(1082) и(1080) й(1081)
russkiy = '&#1056;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081;'

# Fix "RU — [garbage]" pattern  
text = re.sub(r'RU \u2014 [^\<\"]{0,20}', 'RU \u2014 ' + russkiy, text)
text = re.sub(r'RU &mdash; [^\<\"]{0,20}', 'RU &mdash; ' + russkiy, text)

# Fix French in dropdown
text = text.replace('Fran\ufffd\xa7ais', 'Fran&ccedil;ais')
text = text.replace('Fran\ufffd\ufffd\ufffdais', 'Fran&ccedil;ais')

# Fix Spanish in dropdown  
text = text.replace('Espa\ufffd\ufffd\ufffdol', 'Espa&ntilde;ol')
text = text.replace('Espa\xc3\xb1ol', 'Espa&ntilde;ol')

# Fix any remaining replacement characters near language names
text = text.replace('\ufffd\xa0ус\ufffd\ufffd\ufffdкий', russkiy)
text = re.sub(r'\ufffd+\xa0?[а-яА-ЯёЁ\ufffd]+кий', russkiy, text)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(text)

print('Done!')

# Verify key lines
lines = text.split('\n')
for i, line in enumerate(lines):
    if 'fi-fr' in line or 'fi-es' in line or 'fi-ru' in line or 'fi-it' in line or 'fi-gb' in line:
        print(f'L{i+1}: {line.strip()[:120]}')
