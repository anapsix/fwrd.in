#!/bin/bash

echo "[INFO]: upgrading FWRD.in" >&2

RUNNING="$(docker inspect -f '{{ .State.Running }}' fwrd.in 2>/dev/null)"

set -e -o pipefail 
if docker pull anapsix/fwrd.in | grep Status: | grep -q "newer image"; then
  echo "[INFO]: got new image" >&2
  if [[ "$RUNNING" == "true" ]]; then
    echo -n "[INFO]: stopping running container.." >&2
    if docker rm -f fwrd.in 2>/dev/null; then
      echo " ok" >&2
    else
      echo " failed" >&2
      exit 1
    fi
    echo -n "[INFO]: starting new image version.." >&2
    if docker run -d --name fwrd.in -p 8080:8080 anapsix/fwrd.in 2>/dev/null; then
      echo " ok" >&2
    else
      echo " failed" >&2
      exit 1
    fi
  else
    echo "[INFO]: FWRD.in is not running, skipping re-launch.." >&2
  fi
else
  echo "[INFO]: no new images found" >&2
fi
