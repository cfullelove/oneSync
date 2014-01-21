# OneSync

OneSync monitors a source directory for changes, and upon detecting a change, synchronsizes the directory in one direction.

## Installation

### Requires
* rysnc
* Box (for building the phar) [kherge/Box](https://github.com/kherge/Box)

## Usage
```
oneSync.phar $SOURCE_DIR $DEST_DIR
```
`$SOURCE_DIR` and `DEST_DIR` are in the same format as rsyc - e.g. for a remote server `server:dir/`.
Note: if the remote server doesn't use publickey authentication, you will need to enter a password each time.