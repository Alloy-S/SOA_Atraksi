build-image:
	docker build -t nameko/atraksi-service:$(TAG) .;

docker-tag:
	docker tag nameko/atraksi-service:$(FROM_TAG) \
	nameko/atraksi-service:$(TAG)

push-image:
	docker push nameko/atraksi-service:$(TAG)
