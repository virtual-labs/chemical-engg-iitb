build-dir=../build
lib-dir=lib
build-js-dir=${build-dir}/js
theme=green-icon

all: ${theme}

green-icon:

	mkdir ${build-dir};rsync -avz --progress lab/* lib/* help themes/${theme}/* ${build-dir}

blue-icon:

	mkdir ${build-dir};rsync -avz --progress lab/* lib/* help themes/${theme}/* ${build-dir}

clean:
	rm -rf ${build-dir}









