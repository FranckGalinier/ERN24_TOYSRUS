#!/bin/bash

# Run the script to automate the process

cd ./

lando start

lando db-import toys-r-us.sql
