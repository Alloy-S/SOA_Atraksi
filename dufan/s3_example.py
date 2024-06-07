import boto3

BUCKET_NAME = "soa-dufan"

s3 = boto3.client('s3')

#list all bucket
# buckets_resp = s3.list_buckets()
# for bucket in buckets_resp['Buckets']:
#     print(bucket)

#list all object in a bucket
response = s3.list_objects_v2(Bucket=BUCKET_NAME)
for obj in response['Contents']:
    # print(obj)
    key = obj['Key'].replace(" ", "+")
    url = "https://{0}.s3.amazonaws.com/{1}".format(BUCKET_NAME, key)
    print(url)

#upload file to s3
# with open("food8.jpg", "rb") as f:
#     s3.upload_fileobj(f, BUCKET_NAME, 'foo9.jpg', ExtraArgs={"ACL": "public-read"})

#download file
# s3.download_file(BUCKET_NAME, 'download.jpg', 'dufan.jpg')

#download file with binary data
# with open('dufan.jpg', "wb") as f:
#     s3.download_fileobj(BUCKET_NAME, 'download.jpg', f)

#presigned URL to give limited access to en unauthorized user
# with open("food8.jpg", "rb") as f:
#     s3.upload_fileobj(f, BUCKET_NAME, 'foo10.jpg')
# url = s3.generate_presigned_url("get_object", Params={"Bucket": BUCKET_NAME, "Key": "download.jpg"}, ExpiresIn=10)
# print(url)

#create bucket
# bucket_location = s3.create_bucket(ACL="public-read", Bucket="new-Bucket")

# print(bucket_location)