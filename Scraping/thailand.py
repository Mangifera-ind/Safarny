from bs4 import BeautifulSoup
import requests
'''def scrape():'''
link = "https://cairo.thaiembassy.org/en/page/68399-visa-application?menu=5d81bfb415e39c24dc003581"
page = requests.get(link)
soup = BeautifulSoup(page.text, 'html.parser')
    
tourist_div = soup.find('table')
    
if tourist_div:
        print(tourist_div.get_text())
'''schedule.every().day.at("00:00").do(scrape)
while True:
    schedule.run_pending()
    time.sleep(60)'''
    
