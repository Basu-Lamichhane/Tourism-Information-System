import csv
import os
import requests

# Specify the paths and filenames
csv_file = "E:\\Basu\\Python practice\\project db\\tbl_district.csv"
image_folder = "C:\\xampp\\htdocs\\Tourism-Information-System\\image\\district_images"

# Create the image folder if it doesn't exist
if not os.path.exists(image_folder):
    os.makedirs(image_folder)

# Open the CSV file for reading and updating
with open(csv_file, 'r', newline='',encoding="utf-8") as file:
    reader = csv.reader(file)
    rows = list(reader)  # Read all rows into a list
    count=0
    # Download images and update URLs with local paths
    for row in rows:
        image_url = row[2]  # Assuming the image URL is in the first column
        print(image_url)
        
        # making the image file name the id and name
        image_filename = str(row[0])
        count+=1
        print(count)
        # Download the image and save it to the local path with .jpg extension
        # Build the local path with .jpg extension
        image_path = os.path.join(image_folder, image_filename + ".jpg")

        response = requests.get(image_url)
        with open(image_path, 'wb') as image_file:
            image_file.write(response.content)

        # Replace the URL with the local path
        row[2] = image_path

# Save the updated data back to the CSV file
with open(csv_file, 'w', newline='',encoding="utf-8") as file:
    writer = csv.writer(file)
    writer.writerows(rows)

print("Images downloaded and URLs replaced with local paths successfully.")
