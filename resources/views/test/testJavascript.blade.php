<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script type="text/javascript">
	// function test(fruit)
	// {
	// 	const redFruits = ['apple', 'strawberry', 'cherry'];
	// 	if(redFruits.includes(fruit))
	// 		{
	// 			console.log("red");
	// 		}
	// }
	// test("apple");


	
 
	// function test(color) {
	// 	const fruitColor = {
 //    red: ['apple', 'strawberry'],
 //    yellow: ['banana', 'pineapple'],
 //    purple: ['grape', 'plum']
 //  	};
	//   return fruitColor[color] || [];
	// }
	// console.log(test("red"));

	const fruits = [
		{name: 'apple', color: 'red'},
		{name: 'strawberry', color: 'red'},
		{name: 'banana', color: 'yellow'},
		{name: 'pineapple', color: 'yellow'},
		{name: 'grape', color: 'purple'},
		{name: 'plum', color: 'purple'},
	];

	function test(color){
		return fruits.filter(f=>f.color == color);
	}
	console.log(test('red'));

	
</script>
</html>