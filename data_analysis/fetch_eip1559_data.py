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
ENDPOINT = f"/api/max-priority-fee-per-gas-estimate?network={NETWORK}"


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


def fetch_data(destination: str):
    url = f"{BASE_URL}{ENDPOINT}"
    filename = url2filename(url)
    destination = Path(destination) / filename
    try:
        response = urllib.request.urlopen(url)
        content = response.read()
    except urllib.error.HTTPError as e:
        extra = {"url": url}
        logger.error("Error fetching from backend", exc_info=True, extra=extra)
        # hacky gracefully fail (most-likely pre-london)
        # we want to still display data
        # ideally some of this should also be handled frontend side
        # but we prefer not to touch the legacy (PHP) frontend too much
        content = b'{"instant":2,"fast":1,"standard":1}'
    with open(destination, "w") as f:
        f.write(content.decode())


def main():
    parser = argparse.ArgumentParser(
        description="Fetch EIP-1559 estimations and dump to JSON"
    )
    parser.add_argument(
        "destination",
        help="Destination directory for dumping the JSON files",
    )
    args = parser.parse_args()
    fetch_data(args.destination)


if __name__ == "__main__":
    main()
