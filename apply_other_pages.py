import re

def get_translations_from_ts(filename):
    with open(filename, 'r', encoding='utf-8') as f:
        text = f.read()
    
    # Extract the 'en: { ... }' block
    match = re.search(r'en:\s*\{(.*?)(?=fr:\s*\{)', text, re.DOTALL)
    if not match:
        return {}
    en_block = match.group(1)
    
    # Extract services block
    services_match = re.search(r'services:\s*\{(.*?)\},', en_block, re.DOTALL)
    contact_match = re.search(r'contact:\s*\{(.*?)\}', en_block, re.DOTALL)
    
    services_dict = {}
    if services_match:
        for line in services_match.group(1).split('\n'):
            line = line.strip()
            if not line: continue
            if ':' in line:
                k, v = line.split(':', 1)
                k = k.strip()
                v = v.strip().strip(',').strip('"')
                services_dict[k] = v
                
    contact_dict = {}
    if contact_match:
        for line in contact_match.group(1).split('\n'):
            line = line.strip()
            if not line: continue
            if ':' in line:
                k, v = line.split(':', 1)
                k = k.strip()
                v = v.strip().strip(',').strip('"')
                contact_dict[k] = v
                
    return services_dict, contact_dict

def inject_tags(file_path, keys_dict, prefix):
    with open(file_path, 'r', encoding='utf-8') as f:
        html = f.read()
        
    for k, text in keys_dict.items():
        if not text: continue
        # decode escaped quotes if any
        text = text.replace('\\"', '"')
        
        target1 = f'>{text}<'
        replacement1 = f' data-i18n="{prefix}.{k}">{text}<'
        
        target2 = f'>{text} <'
        replacement2 = f' data-i18n="{prefix}.{k}">{text} <'
        
        target3 = f'>{text}&mdash;'
        replacement3 = f' data-i18n="{prefix}.{k}">{text}&mdash;'

        if target1 in html:
            html = html.replace(target1, replacement1)
        elif target2 in html:
            html = html.replace(target2, replacement2)
        elif target3 in html:
            html = html.replace(target3, replacement3)
        else:
            if text in html:
                # careful replacement
                html = html.replace(text, f'<span data-i18n="{prefix}.{k}">{text}</span>')
                
    with open(file_path, 'w', encoding='utf-8') as f:
        f.write(html)

if __name__ == '__main__':
    srv_keys, cnt_keys = get_translations_from_ts('i18n.ts')
    inject_tags('services/index.html', srv_keys, 'services')
    inject_tags('contact/index.html', cnt_keys, 'contact')
    print('Tags injected.')
