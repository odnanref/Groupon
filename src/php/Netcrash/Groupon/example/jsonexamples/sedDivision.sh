cat tDivision.json | grep -i "\[" | sed -e 's/\[\|\]\|=\|\\\|>\|"\| \+//gi' | sed 's/\([a-z]\)\([a-zA-Z0-9]*\)/\u\1\2/g'  | awk ' { print "private $"$1";\n\npublic function set"$1"(\$val) { $this->"$1" = $val;}\npublic function get"$1"() { return $this->"$1"; }\n" }'

