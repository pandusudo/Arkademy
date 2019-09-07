function printTriangle(row){
  	var triangle = "";
  	if(row < 3){
    	return undefined;
    }else{
      for(var i = 0; i < row+(row-1); i++){
        triangle += "*\t"
      }
      triangle += "\n"
      for(var i = 1; i <= row-1; i++){
          for(var j = 0; j <= row+(row-1); j++){
              if(i == (row-1) && j == row){
                  triangle += ""
              }else{
                  if(j == i || j == row+(row-1) - i){
                      triangle += "*"
                  }else{
                      triangle += "\t"
                  }
              }
          }
          if(i == row-1){
              triangle += ""
          }else{
              triangle += "\n"
          }
      }
      return triangle;
    }
}

console.log(printTriangle(3));