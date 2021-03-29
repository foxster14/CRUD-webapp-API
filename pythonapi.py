import json
import requests

headers = {'Content-Type': 'application/json'}

url = "http://192.168.56.10/search_emp_no.php?emp_no=499999"

response = requests.get(url, headers)

#print the contents of the "response" variable
#what kind of data is this?
print("\nThe response var: ", response)

#we *could* have multiples, so loop thru to see
for item in response:
    #what is an item in the response
    print("\nitem in response: ", item)

    #and what type of data is it
    print("\nitem data type: ", type(item))

    #we need to decode what we get from the webserver - using UTF-8
    record = item.decode('utf-8')
    #what type of data do we have now?
    print("\nHere is the encoded value: ", record)
    print("\nUTF-8 Encoded Data is now a: ", type(record))

#now lets load the encoded data as JSON
recordjson = json.loads(record)
print("\nThe JSON converted string is now this: ", recordjson)
#what type of data is it?
print("\nThe data type of recordjson is: ", type(recordjson))

#now grab just the first name from the two name/value pairs
#since JSON is treated as a Dictionary in Python, we can retrieve the value of a piece of data using normal
#python operations
print("\nJust the first name: ", recordjson["first_name"])
print("\nJust the last name: ", recordjson["last_name"])

#pull it all together
print("\nThe name of the employee retrieved was " + recordjson["first_name"] + " " + recordjson["last_name"])

#Add code to this file so that it prompts the user to input an employee number