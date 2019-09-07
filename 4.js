function groupNumber(str){
  var ret = []
  var num = str.match(/\d+/g).join("");
  for(var i = 0; i < num.length; i += 3){
    ret.push(num.substr(i, 3))
  }
  if(ret[ret.length-1].length == 1){
    ret[ret.length-1] = ret[ret.length-2].charAt(2) + ret[ret.length-1];
    ret[ret.length-2] = ret[ret.length-2].charAt(0) + ret[ret.length-2].charAt(1);
  }
  return ret.join('-');
}

console.log(groupNumber("9931341 -1 133233 14-232"));