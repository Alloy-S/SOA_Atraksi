TAG = latest

build-image:
	docker build -t nameko/gateway-service:$(TAG) ./gateway

docker-tag:
	docker tag nameko/gateway-service:$(TAG) \
	nameko/gateway-service:$(TAG)

push-image:
	docker push nameko/gateway-service:$(TAG)