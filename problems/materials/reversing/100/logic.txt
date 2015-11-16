public String loop{
	int x = 2;
	String phrase = "";
	for(int i = 0; i < x; i++){
		if( i == 0){
			phrase += "f";
		} else if( phrase.equals("fl")){
			phrase += "a";
		} else {
			phrase += "l";
		}
	}
	phrase += "g";
	
	return phrase;
}