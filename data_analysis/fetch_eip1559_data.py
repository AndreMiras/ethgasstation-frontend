#!/usr/bin/env python3
"""
Fetches EIP-1559 data from the new backend and dump to JSON.
Using the same approach of the existing ones of dumping backend data to JSON files.
However this data is fetched directly from the new backend rather than from Redis.
There're two advantages of re-using this design for displaying EIP-1559 data:
    1) Easier to fit to the existing design
    2) Make the process more async and non-blocking for the frontend
"""
import os
import logging
import argparse
import urllib.request
from pathlib import Path
from urllib.parse import urlparse

logger = logging.getLogger(__name__)

NETWORK = "mainnet"
BASE_URL = "https://egs-backend-v2-staging.defipulse.com"
ENDPOINTS = (
    f"/api/max-priority-fee-per-gas-estimate?network={NETWORK}",
    f"/api/base-fee-per-gas?network={NETWORK}",
)


def url2filename(url: str):
    """
    Given an URL, returns a local (JSON) filename it corresponds to.
    >>> url = "https://egs-backend-v2.defipulse.com/api/base-fee-per-gas?network=mainnet"
    >>> url2filename(url)
    'base-fee-per-gas.json'
    """
    path = urlparse(url).path
    basename = os.path.basename(path)
    return f"{basename}.json"


def fetch_data(url: str, destination: str):
    filename = url2filename(url)
    destination = Path(destination) / filename
    try:
        response = urllib.request.urlopen(url)
    except urllib.error.HTTPError:
        extra = {"url": url}
        logger.error("Error fetching from backend", exc_info=True, extra=extra)
        # it's OK to fail sometimes and miss a few calls as long as the file was
        # already created once. The frontend would simply show some outdated data
        return
    content = response.read()
    with open(destination, "w") as f:
        f.write(content.decode())


def fetch_all(destination: str):
    for endpoint in ENDPOINTS:
        url = f"{BASE_URL}{endpoint}"
        fetch_data(url, destination)


def main():
    parser = argparse.ArgumentParser(
        description="Fetch EIP-1559 estimations and dump to JSON"
    )
    parser.add_argument(
        "destination",
        help="Destination directory for dumping the JSON files",
    )
    args = parser.parse_args()
    fetch_all(args.destination)


if __name__ == "__main__":
    main()
