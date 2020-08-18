txtYellow='\[\033[0;33m\]' # Orange
txtWhite='\[\033[1;37m\]' # White
txtGreen='\[\033[0;32m\]' # Green
lightGray='\[\033[0;37m\]' # light Gray
lightBlack='\[\033[1;30m\]' # light Black
lightRed='\[\033[1;31m\]' # Red
lightGreen='\[\033[1;32m\]' # Green
lightYellow='\[\033[1;33m\]' # Yellow
lightBlue='\[\033[1;34m\]' # Blue
lightPurple='\[\033[1;35m\]' # Purple
lightCyan='\[\033[1;36m\]' # Cyan

git_branch ()
{
  if ! git rev-parse --git-dir > /dev/null 2>&1; then
    return 0
  fi

  branch=$(git branch 2>/dev/null| sed -n '/^\*/s/^\* //p')
  echo "($branch)"
}

PS1='$(if git rev-parse --git-dir > /dev/null 2>&1; then if git diff --quiet 2>/dev/null >&2; then  echo "'${lightGreen}'"; else echo "'${lightRed}'"; fi fi)'
PS1+='$(git_branch)'
PS1="\n${txtWhite}\A [${lightCyan}\u${txtGreen}@${lightPurple}\h] ${lightYellow}\w${PS1}"    
PS1="${PS1}\n└─ ${lightYellow}\W ${txtGreen}\$ ${lightGreen}"
