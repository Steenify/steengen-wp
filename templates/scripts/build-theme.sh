#!/bin/bash

echo "Remove old file"
rm -f steen.theme.zip

# Variables
current_dir=$(pwd)

app_dir="${current_dir}/../wp-content/themes/steen/app"
frontend_dir="${current_dir}/../frontend"

echo "Remove old [app] directory and copy files from [frontend] directory"
# Remove app directory and copy from fe directory
rm -rf "${app_dir}"
mkdir -p "${app_dir}"
cp -a "${frontend_dir}/." "${app_dir}"

echo "Start building theme fe"
# Build frontend
cd "${current_dir}/../wp-content/themes/steen/app"
npm install
npm run build

echo "Creating steen.theme.zip"
# Build theme
cd "${current_dir}/../wp-content/themes/"
zip -r steen.theme.zip steen -x \*.git\* -x \*node_modules\*

mv steen.theme.zip ${current_dir}
echo "Done"
