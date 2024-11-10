import sys
import io
import requests
from bs4 import BeautifulSoup

sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

link = "http://eg.china-embassy.gov.cn/eng/ywzn/lsyw/bszn/1/201810/t20181031_7257787.htm"
page = requests.get(link)
soup = BeautifulSoup(page.text, 'html.parser')
data = soup.find('div', id='News_Body_Txt_A')
    
if data:
    print(data.get_text())

