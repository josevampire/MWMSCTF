import java.util.Scanner;

public class Arrays(){

	public static void main(String[] args){

		Scanner scanner = new Scanner(System.in);
		int[] myArray = new int[] {5,3,9,0,1,4,2,6,8,7};
		char[] theAlphabet = new char[] {'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'};
		Boolean gotIt = false;

		String input = scanner.nextLine();
		char[] yourArray = input.toCharArray();

		if(yourArray[myArray[0]-myArray[1]-myArray[6]] == theAlphabet[myArray[3]]){
			System.out.println("1");
			if(yourArray[myArray[4]] == theAlphabet[myArray[2] + myArray[8]]){
				System.out.println("2");
				if(yourArray[myArray[1]-myArray[4]] == 'r'){
					System.out.println("3");
					if(yourArray[myArray[1]] == theAlphabet[myArray[6] - 2]){
						System.out.println("4");
						if(yourArray[4] == theAlphabet[myArray[5]*myArray[7]]){
							System.out.println("5");
							if(yourArray[myArray[0]*myArray[4]] == theAlphabet[18]){
								System.out.println("6");
								if(yourArray[(myArray[7]-myArray[1])*myArray[6]] == ' '){
									System.out.println("7");
									if(yourArray[myArray[9]] == theAlphabet[myArray[1]*myArray[7]-myArray[4]]){
										System.out.println("8");
										if(yourArray[myArray[5]*myArray[6]] == yourArray[6]){
											System.out.println("9");
											  if(yourArray[(int)Math.pow((double)myArray[1],2.0)] == theAlphabet[myArray[7]-myArray[4]]){
												System.out.println("10");
												if(yourArray[myArray[2]+myArray[4]] == theAlphabet[(int)Math.sqrt((double)myArray[8]*(double)myArray[5]*8.0)]+myArray[5]){
													System.out.println("11");
													//This one is easy
													if(yourArray[11] == 'n'){
														gotIt = true;
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}

		if(gotIt){
			System.out.println("The answer is your input: " + input);
		} else {
			System.out.println("Invalid input, try again.");
		}

		scanner.close();

	}

}
