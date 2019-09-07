function printTriangle(row){
  	var triangle = "";
	for(var i = 0; i < row+(row-1); i++){
      triangle += "*\t"
    }
  	triangle += "\n"
  	for(var i = 1; i <= row-1; i++){
    	for(var j = 0; j <= row+(row-1); j++){
          	if(i == (row-1) && j == i){
            	triangle += "*"
            }else{
        		if(j == i || j == row+(row-1) - i){
            		triangle += "*"
            	}else{
            		triangle += "\t"
            	}
            }
        }
      	triangle += "\n"
    }
  	return triangle;
}

console.log(printTriangle(3));