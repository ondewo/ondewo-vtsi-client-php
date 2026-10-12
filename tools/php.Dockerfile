# The PHP tool chain of this repository as an image, for a host without php or composer.
# The Makefile runs php and composer from it only when neither is installed (see PHP_IN_DOCKER):
# `make release` validates, tests and publishes from a developer machine, and php is not part of
# the release prerequisites anywhere else in the client fleet. CI installs php itself and never
# builds this. Every version is pinned, so a release is tested against the same tool chain it was
# yesterday: the extensions mirror ci.yml (grpc, bcmath, pcov), grpcio the TLS test server's pin.
FROM composer:2.8.12 AS composer

FROM php:8.4.25-cli

# git and unzip: composer fetches dist archives and falls back to git sources.
# python3 + grpcio: tests/Tls/tls_test_server.py, the gRPC server the TLS handshake tests dial.
RUN apt-get update \
    && apt-get install -y --no-install-recommends git unzip zlib1g-dev python3 python3-pip \
    && rm -rf /var/lib/apt/lists/*

RUN MAKEFLAGS=-j"$(nproc)" pecl install grpc-1.82.0 pcov-1.0.12 \
    && docker-php-ext-enable grpc pcov \
    && docker-php-ext-install bcmath

RUN python3 -m pip install --no-cache-dir --break-system-packages grpcio==1.82.1

COPY --from=composer /usr/bin/composer /usr/bin/composer
