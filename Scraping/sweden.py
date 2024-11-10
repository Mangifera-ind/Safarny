from bs4 import BeautifulSoup
import requests

link = "https://www.swedenabroad.se/en/about-sweden-non-swedish-citizens/egypt/going-to-sweden/visiting-sweden/tourist-visit/"
page = requests.get(link)
soup = BeautifulSoup(page.text, 'html.parser')
    
tourist_div = soup.find('div', class_="col-xs-12 col-md-8 article-page")   
    
if tourist_div:
    print(tourist_div.get_text())

    