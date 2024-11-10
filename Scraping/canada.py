from bs4 import BeautifulSoup
import requests
import json

link = "https://www.canada.ca/en/immigration-refugees-citizenship/services/visit-canada/apply-visitor-visa.html"
page = requests.get(link)
soup = BeautifulSoup(page.text, 'html.parser')
data = soup.find('div', id='tourist')
    
if data:
        print(data.get_text())