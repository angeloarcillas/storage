# Linux

apropos // search the manual page names and descriptions
whatis // display one-line manual page description
man // display system documentation
`<command>` --help  // brief command information
info `<command>`


<details>
<summary>Package Management</summary>

**Advanced Package Tool**
```cs
[ sudo apt update ]               // Update repository
[ sudo apt upgrade ]              // safe Upgrade packages
[ sudo apt full-upgrade ]         // full Upgrade packages
[ sudo apt install <pkg> ]        // install package
[ sudo apt remove <pkg> ]         // remove package except configs
[ sudo apt purge <pkg> ]          // completely remove package
[ sudo apt search <pkg> ]         // search packages
[ apt-cache search <pkg> ]        // search packages
[ sudo apt show <pkg> ]           // show information of package
[ apt list --upgradeable ]        // list upgradable
[ apt list --installed ]          // list installable
[ apt-cache stats ]               // overall stat about cache
[ sudo apt clean ]                // clean local repository of retrieved package files
[ sudo apt autoclean ]            // same as apt clean except only removes package files that can no longer be downloaded
[ sudo apt autoremove ]           // clean unused dependency
```

**PACMAN**
```cs
[ sudo pacman -Syyu ]             // update/upgrade/clean
[ sudo pacman -S <pkg> ]          // install package
[ sudo pacman -Ss <pkg> ]         // search package
[ sudo pacman -Sw <pkg> ]         // download without installing package
[ sudo pacman -R <pkg> ]          // remove package
[ sudo pacman -Rs <pkg> ]         // remove package + dependency
[ sudo pacman -Rsc <pkg> ]        // remove package + dependency + dependent package
[ sudo pacman -Rc <pkg> ]          // remove cache package that are not currently installed
```

**Zypper**
```cs
[ zypper help <command> ]         // display command help message
[ zypper ]                        // list available global options and commands
[ zypper lp ]                     // update repository
[ zypper patch ]                  // patch updates
[ zypper up ]                     // update packages
[ zypper in <pkg> ]               // install package
[ zypper se <pkg> ]               // search package
[ zypper rm <pkg> ]               // remove package
```

**Compile**
```cs
[ ./configure ]
[ make ]
[ make install ]
```
</details>

<details>
<summary>Service</summary>

```cs
[ sudo systemctl mask <name.service> ]
[ systemd-analyze blame ]
[ systemctl list-unit-files --type=service ]
[ systemctl list-unit-files --type=service | grep enabled ]

[ systemctl ]                      // systemd
[ service ]
[ sysctl ]


```
</details>
| foo | bar |

### Keybindings
|               **Command**               |                       **Description**                      |
| --------------------------------------- | ---------------------------------------------------------- |
| ctrl-w                                  | delete last word                                           |
| ctrl-u                                  | delete from cursor to start of the line                    |
| ctrl-k                                  | delete from cursor to end of the line                      |
| alt-b & alt-f                           | move forward/backward word by word                         |
| ctrl-b & ctrl-f<code>&nbsp;</code>      | move forward/backward letter by letter                     |
| ctrl-a | beginning of the line |
| ctrl-e | end of the line |
| ctrl-l | move cursor by 1 screen |
| ctrl-x ctrl-e | open default text editor  |
| alt-shift-3 | comment the line |
| ctr-v tab | tab literal |

<hr>

### Commands
|               **Command**               |                       **Description**                      |
| --------------------------------------- | ---------------------------------------------------------- |
| history                                 | show recent commands, use !<number> to execute the command |
| `!!` & `!$`                             | previous command & argument                                |
| ctrl-r                                  | search command from history                                |
| ctrl-.                                  | cycle through previous command                             |
| `<command>` + Tab Tab<code>&nbsp;</code>| show possible command                                      |
| pstree | show tree of processes |
| pgrep <pattern> | show matched pid |
| pkill <pattern> | kill matched |
| lsof | list open files |
| uptime | tell how long the system is running |
| w | show who is logged on and what they are doing |
| man ascii | good ascii table reference |
| grep . * | print the content of every file with filename on dir |
| head -10 * | print the content of every file with headings on dir limit of 10 lines|
| watch | execute a program periodically, showing output fullscreen |
<details>
<summary>Inode</summary>

# Inode - index node

- unique at partition level
- can have 2 files with the same inode but on a different partition level
- system will create 1 inode per 2k bytes of space by default
- if you run out of inodes, you cannot create new file
- when using `ls -li`, the inode and filename are what stored in the directory <br>
  but the other information are retrieved from the inode table using the inode number
- has the ability to store the inode data in the inode itself. called **Inlining**
- use `df-hi` to list inode information for each file system
- soft link/symlink - points to a file, have a different inode
- hard link - points to a inode, have the same inode

## Stored metadata about file
- Location of the hard drive.
- Permission.
- Owner/Group.
- Size.
- Date/time.
- Any other information needed.
</details>


|               **Command**               |                       **Description**                      |
| --------------------------------------- | ---------------------------------------------------------- |
| >  | overide |
| >> | append  |

- ( `~` ) tilde in sh script refers to `$HOME`
- Use zless, zmore, zcat, and zgrep to operate on compressed files.

xargs
128K limit
awk
sed
/proc
find . -type f -ls
ls -lR

**optimize ssh** 

~/.ssh/config
```bash
TCPKeepAlive=yes
ServerAliveInterval=15
ServerAliveCountMax=6
Compression=yes
ControlMaster auto
ControlPath /tmp/%r@%h:%p
ControlPersist yes
```

stat -c '%A %a %n' ~/Desktop // show permissions of the file in octal form
python -m http.server 8000 // simple web server to share files across network

## File and Data
find  // search for files in a directory hierarchy
sort  // sort lines of text files
uniq  // report or omit repeated lines
comm  // compare 2 sorted files line by line
cut  //remove sections from each line of files
paste  // merge lines of files
join  // join lines of two files on a common field
wc  // print newline, word, and byte counts for each file
nl // number of lines of file
tee // read, write to output and file
rename  // rename multiple files
rsync  // fast, versatile, remote (and local) file-copying tool
dd  // convert and copy a file
shuf  // generate random permutations
diff  // compare files line by line
patch  // apply a diff file to an original
hexdump  // ASCII, decimal, hexadecimal, octal dump
iconv  // Convert encoding of given files from one encoding to another
uconv  // convert data from one encoding to another
split  // split a file into pieces
csplit  // split a file into sections determined by context lines

## system
ss  // utility to investigate sockets
vmstat // virtual memory statistic
du -sh *  // summary of user disk usage

lsof | grep deleted | grep "filename"  // check deleted file if it is in used

















2> // stdin error only
`&>` or `2>&1` // stdin command + error
/dev/null 2>&1 // void

ls | tee foo.txt // output commad + stdin to file

sort -r file.txt // reverse sort
sort -n file.txt // numeric sort


tr // translate, squeeze or delete




// filetype | user | group | other
d | rwx | r-x | r-x

4: r // read
2: w // write
1: x // execute
- // empty
t // everyone can add/write/modify file but only root can delete // +t / 4 // chmod 1755
s // SUID // let the user get the file owner permission +x // +s / 4 //chmod 4755
chmod g+s // same as suid // let user run as if it was a member of that group

chmod ug+x file // add execute permission to user and group
chown // change owner
chgrp // change group
chown user:group file // change owner+group
umask // set default permission


effective user id
real user id
saved user id