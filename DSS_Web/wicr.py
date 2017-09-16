import requests
import webbrowser
from bs4 import BeautifulSoup

keyword = "scramjet"

res = requests.get('http://en.wikipedia.org/wiki/'+keyword)
soup = BeautifulSoup(res.content, 'html.parser')
body = soup.findAll("div", { "class" : "mw-parser-output" })
abst = body[0].findAll("p")
txt = ""
for p in abst:
    if not len(p):
        break
    #print(''.join(p.findAll(text=True)))
    txt+=str(p)
    print(p)
    
webbrowser.open(txt,new=2)
