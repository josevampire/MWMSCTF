public String count(String x, int y){
	if(y==5){
		return x;
	} else {
		return count("a" + x + "p", y++);
	}
}
