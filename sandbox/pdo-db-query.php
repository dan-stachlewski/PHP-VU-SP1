<?php 

/***********************************************************
 * PHP DATA OBJECTS [PDO]
/***********************************************************
  * VIDEO: queryDatabase.mp4
/***********************************************************
 * LOCATION: \Chapter11_13DavidPowers\videos\Week 11-17
/***********************************************************
 * - This time we are Querying a MySQL database using PDO
 * - We have created our config array included below:
 * - We have Instantiated a PDO Object
 * - We have Connected to our database/ MySQL Server
 *
 * - Now, we are going to Query a database and Loop through the results set
 * - We will be grabbing all results and displaying particular values/ specific values
 *
/***********************************************************
 * 1. Query Method
/***********************************************************
 * - the words within the query are wrapped in `` to left of [1] button NOT '' exclamation marks!!!
 * - We are requesting data from:
 * 		- DATABASE = website [DEFINED in the 'pdo-db-connect.php' ]
 * 		- TABLE = articles
 * 		- TABLE COLUMN = title
 * - $query = $db->query("
 		SELECT `articles`.`title`
 		FROM `articles` 
 	 ");
 * - Traditional method of Looping thru a dbase is a 'WHILE LOOP'
 * - while ($row = mysql_fetch_assoc($query)) { 'the old way' }
 * - while ($row = mysql_fetch_assoc($query)) { 'the old way' }
 * - The [Query Method] returns PDO Statement Object
 * - and has a set of Methods that allow us to manipulate the results or prepared SQL query
 * - 
 */

include ('pdo-db-connect.php');

$query = $db->query("
 		SELECT `articles`.`title`
 		FROM `articles` 
 	 ");

echo '<pre>';
print_r($query);
echo '</pre>';

/* 
	RESULT: 
	PDOStatement Object 
	(
		[queryString => 
					SELECT `articles`.`title` 
					FROM `articles`]
	)
*/

/***********************************************************
 * 1. Display Query Results
/***********************************************************
 * - within the while loop we will use $query->fetch(PDO::)
 * - fetch = Method
 * - PDO::FETCH_ASSOC = specifies how we are fetching the data
 * - Scope Resolution Operator to go ahead and access FETCH_ASSOC which simply tells the code how we are fetching the associative array and is a generic handler for dbases in general
 * - OUTPUT: list of article titles within the dbase
 * - $rows = $query->fetch(PDO::FETCH_ASSOC);
 * - 
 * - 
 */
/*
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	echo $row['title'], '</br>';
}
*/

$rows = $query->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($rows);
echo '</pre>';

/* 
	RESULT: 
	PDOStatement Object 
	(
		[title] => The .net strip #24: Abandon shopping cart!
	)
*/

/*
 * change fetch to fetchAll
*/

$rows = $query->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($rows);
echo '</pre>';

/* RESULT: 
	Array
 (
    [0] => Array
        (
            [title] => An intro to Lean
        )

    [1] => Array
        (
            [title] => Build a 360 view image slider with Js
        )

    [2] => Array
        (
            [title] => Don't rely too much on Js Libraries
        )

    [3] => Array
        (
            [title] => Social Media at SWSWi: top 5!
        )

    [4] => Array
        (
            [title] => Get more outta your CSS3
        )

    [5] => Array
        (
            [title] => The Agile Waterfall
        )

    [6] => Array
        (
            [title] => Dev guide to new exciting Web Tech!
        )

    [7] => Array
        (
            [title] => The .net Strin #23: Streamlining our Process
        )

    [8] => Array
        (
            [title] => 5 Killer ways to use Maps!
        )

    [9] => Array
        (
            [title] => Josh Brewer on Inspiration
        )

    [10] => Array
        (
            [title] => The Jeffrey Whey Way!
        )

    [11] => Array
        (
            [title] => What will be better than HTML5?
        )

    [12] => Array
        (
            [title] => PHP will make a comeback!
        )

    [13] => Array
        (
            [title] => CMS is not a Mess
        )

    [14] => Array
        (
            [title] => What the SASS???
        )

 )
*/

$query = $db->query("
 		SELECT `articles`.`id`, `articles`.`title`, `articles`.`description`
 		FROM `articles` 
 	 ");

$rows = $query->fetchAll(PDO::FETCH_ASSOC);
//$rows = $query->fetchAll(PDO::FETCH_NUM); <- changes the array to numeric instead of associative
//WHY USE fetchAll? <- b/c if u want to target a particular record you can ref below:

echo '<pre>';
print_r($rows);
echo '</pre>';

/* RESULT:
(	 Array
	(
	    [0] => Array
	        (
	            [id] => 1
	            [title] => The .net strip #24: Abandon shopping cart!
	            [description] => Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam voluptatum atque ipsa consequatur ea ipsam ducimus, minus iste similique perspiciatis tempore sunt, amet. Iusto similique distinctio, sunt ad officia nobis!
	        )

	    [1] => Array
	        (
	            [id] => 2
	            [title] => An intro to Lean
	            [description] => Visit our Facebook Page
	Don't use boring old Lorem Ipsum, give your project a caffeine kick with our Coffee Ipsum!

	        )

	    [2] => Array
	        (
	            [id] => 3
	            [title] => Build a 360 view image slider with Js
	            [description] => 	


	Select All Text	Submit your own Cat Ipsum copy!



	Jump around on couch, meow constantly until given food, stretch. I am the best. Chase imaginary bugs inspect anything brought into the house fall over dead (not really but gets sypathy) for spit up on light gray carpet instead of adjacent linoleum. Eat a plant, kill a hand. Use lap as chair who's the baby sweet beast knock over christmas tree but hate dog, yet love to play with owner's hair tie throwup on your pillow. Pelt around the house and up and down stairs chasing phantoms stare at ceiling caticus cuteicus. Knock dis off table head butt cant eat out of my own dish. Curl into a furry donut mark territory eat and than sleep on your face or claws in your leg so intrigued by the shower. Scratch leg; meow for can opener to feed me damn that dog yet see owner, run in terror shake treat bag, but give attitude, or use lap as chair. Find empty spot in cupboard and sleep all day spread kitty litter all over house. Chase red laser dot purr while eating make meme, make cute face has closed eyes but still sees you chase mice have secret plans i like big cats and i can not lie. Intently sniff hand. 

	Hopped up on catnip chew on cable lick butt meowing non stop for food but find empty spot in cupboard and sleep all day, yet have secret plans and kick up litter. Has closed eyes but still sees you have secret plans use lap as chair. Knock over christmas tree has closed eyes but still sees you jump around on couch, meow constantly until given food, yet cat snacks chase imaginary bugs. Behind the couch hack up furballs knock over christmas tree chew iPad power cord sun bathe scratch the furniture give attitude. Attack feet curl into a furry donut and pelt around the house and up and down stairs chasing phantoms present belly, scratch hand when stroked chase dog then run away. Pooping rainbow while flying in a toasted bread costume in space sleep on keyboard cough furball hide head under blanket so no one can see love to play with owner's hair tie and caticus cuteicus for knock dis off table head butt cant eat out of my own dish. Vommit food and eat it again. 

	Sleep in the bathroom sink eat grass, throw it back up. Hunt by meowing loudly at 5am next to human slave food dispenser sleep on keyboard. Find something else more interesting claws in your leg. Jump around on couch, meow constantly until given food, make meme, make cute face, but climb leg chase imaginary bugs, yet bathe private parts with tongue then lick owner's face. Eat and than sleep on your face chew iPad power cord caticus cuteicus but meow all night having their mate disturbing sleeping humans. Find empty spot in cupboard and sleep all day curl into a furry donut swat at dog, but stick butt in face lick butt. See owner, run in terror sweet beast. Meowing non stop for food if it fits, i sits. Climb leg hide from vacuum cleaner meow all night having their mate disturbing sleeping humans the dog smells bad curl into a furry donut. Hiss at vacuum cleaner leave dead animals as gifts sleep on keyboard chase imaginary bugs, sit by the fire eat a plant, kill a hand. Chase laser hunt by meowing loudly at 5am next to human slave food dispenser, hopped up on catnip hunt by meowing loudly at 5am next to human slave food dispenser and chase red laser dot stare at the wall, play with food and get confused by dust yet vommit food and eat it again. Kick up litter pelt around the house and up and down stairs chasing phantoms has closed eyes but still sees you. Sun bathe meowing non stop for food but pooping rainbow while flying in a toasted bread costume in space burrow under covers who's the baby. 

	        )

	    [3] => Array
	        (
	            [id] => 4
	            [title] => Don't rely too much on Js Libraries
	            [description] => 	


	Select All Text	Submit your own Cat Ipsum copy!



	Jump around on couch, meow constantly until given food, stretch. I am the best. Chase imaginary bugs inspect anything brought into the house fall over dead (not really but gets sypathy) for spit up on light gray carpet instead of adjacent linoleum. Eat a plant, kill a hand. Use lap as chair who's the baby sweet beast knock over christmas tree but hate dog, yet love to play with owner's hair tie throwup on your pillow. Pelt around the house and up and down stairs chasing phantoms stare at ceiling caticus cuteicus. Knock dis off table head butt cant eat out of my own dish. Curl into a furry donut mark territory eat and than sleep on your face or claws in your leg so intrigued by the shower. Scratch leg; meow for can opener to feed me damn that dog yet see owner, run in terror shake treat bag, but give attitude, or use lap as chair. Find empty spot in cupboard and sleep all day spread kitty litter all over house. Chase red laser dot purr while eating make meme, make cute face has closed eyes but still sees you chase mice have secret plans i like big cats and i can not lie. Intently sniff hand. 

	Hopped up on catnip chew on cable lick butt meowing non stop for food but find empty spot in cupboard and sleep all day, yet have secret plans and kick up litter. Has closed eyes but still sees you have secret plans use lap as chair. Knock over christmas tree has closed eyes but still sees you jump around on couch, meow constantly until given food, yet cat snacks chase imaginary bugs. Behind the couch hack up furballs knock over christmas tree chew iPad power cord sun bathe scratch the furniture give attitude. Attack feet curl into a furry donut and pelt around the house and up and down stairs chasing phantoms present belly, scratch hand when stroked chase dog then run away. Pooping rainbow while flying in a toasted bread costume in space sleep on keyboard cough furball hide head under blanket so no one can see love to play with owner's hair tie and caticus cuteicus for knock dis off table head butt cant eat out of my own dish. Vommit food and eat it again. 

	Sleep in the bathroom sink eat grass, throw it back up. Hunt by meowing loudly at 5am next to human slave food dispenser sleep on keyboard. Find something else more interesting claws in your leg. Jump around on couch, meow constantly until given food, make meme, make cute face, but climb leg chase imaginary bugs, yet bathe private parts with tongue then lick owner's face. Eat and than sleep on your face chew iPad power cord caticus cuteicus but meow all night having their mate disturbing sleeping humans. Find empty spot in cupboard and sleep all day curl into a furry donut swat at dog, but stick butt in face lick butt. See owner, run in terror sweet beast. Meowing non stop for food if it fits, i sits. Climb leg hide from vacuum cleaner meow all night having their mate disturbing sleeping humans the dog smells bad curl into a furry donut. Hiss at vacuum cleaner leave dead animals as gifts sleep on keyboard chase imaginary bugs, sit by the fire eat a plant, kill a hand. Chase laser hunt by meowing loudly at 5am next to human slave food dispenser, hopped up on catnip hunt by meowing loudly at 5am next to human slave food dispenser and chase red laser dot stare at the wall, play with food and get confused by dust yet vommit food and eat it again. Kick up litter pelt around the house and up and down stairs chasing phantoms has closed eyes but still sees you. Sun bathe meowing non stop for food but pooping rainbow while flying in a toasted bread costume in space burrow under covers who's the baby. 

	        )

	    [4] => Array
	        (
	            [id] => 5
	            [title] => Social Media at SWSWi: top 5!
	            [description] => 	


	Select All Text	Submit your own Cat Ipsum copy!



	Jump around on couch, meow constantly until given food, stretch. I am the best. Chase imaginary bugs inspect anything brought into the house fall over dead (not really but gets sypathy) for spit up on light gray carpet instead of adjacent linoleum. Eat a plant, kill a hand. Use lap as chair who's the baby sweet beast knock over christmas tree but hate dog, yet love to play with owner's hair tie throwup on your pillow. Pelt around the house and up and down stairs chasing phantoms stare at ceiling caticus cuteicus. Knock dis off table head butt cant eat out of my own dish. Curl into a furry donut mark territory eat and than sleep on your face or claws in your leg so intrigued by the shower. Scratch leg; meow for can opener to feed me damn that dog yet see owner, run in terror shake treat bag, but give attitude, or use lap as chair. Find empty spot in cupboard and sleep all day spread kitty litter all over house. Chase red laser dot purr while eating make meme, make cute face has closed eyes but still sees you chase mice have secret plans i like big cats and i can not lie. Intently sniff hand. 

	Hopped up on catnip chew on cable lick butt meowing non stop for food but find empty spot in cupboard and sleep all day, yet have secret plans and kick up litter. Has closed eyes but still sees you have secret plans use lap as chair. Knock over christmas tree has closed eyes but still sees you jump around on couch, meow constantly until given food, yet cat snacks chase imaginary bugs. Behind the couch hack up furballs knock over christmas tree chew iPad power cord sun bathe scratch the furniture give attitude. Attack feet curl into a furry donut and pelt around the house and up and down stairs chasing phantoms present belly, scratch hand when stroked chase dog then run away. Pooping rainbow while flying in a toasted bread costume in space sleep on keyboard cough furball hide head under blanket so no one can see love to play with owner's hair tie and caticus cuteicus for knock dis off table head butt cant eat out of my own dish. Vommit food and eat it again. 

	Sleep in the bathroom sink eat grass, throw it back up. Hunt by meowing loudly at 5am next to human slave food dispenser sleep on keyboard. Find something else more interesting claws in your leg. Jump around on couch, meow constantly until given food, make meme, make cute face, but climb leg chase imaginary bugs, yet bathe private parts with tongue then lick owner's face. Eat and than sleep on your face chew iPad power cord caticus cuteicus but meow all night having their mate disturbing sleeping humans. Find empty spot in cupboard and sleep all day curl into a furry donut swat at dog, but stick butt in face lick butt. See owner, run in terror sweet beast. Meowing non stop for food if it fits, i sits. Climb leg hide from vacuum cleaner meow all night having their mate disturbing sleeping humans the dog smells bad curl into a furry donut. Hiss at vacuum cleaner leave dead animals as gifts sleep on keyboard chase imaginary bugs, sit by the fire eat a plant, kill a hand. Chase laser hunt by meowing loudly at 5am next to human slave food dispenser, hopped up on catnip hunt by meowing loudly at 5am next to human slave food dispenser and chase red laser dot stare at the wall, play with food and get confused by dust yet vommit food and eat it again. Kick up litter pelt around the house and up and down stairs chasing phantoms has closed eyes but still sees you. Sun bathe meowing non stop for food but pooping rainbow while flying in a toasted bread costume in space burrow under covers who's the baby. 

	        )

	    [5] => Array
	        (
	            [id] => 6
	            [title] => Get more outta your CSS3
	            [description] => Fish don't fry in the kitchen and beans don't burn on the grill. Took a whole lotta tryin' just to get up that hill. Go Speed Racer. Go Speed Racer. Go Speed Racer go. Love exciting and new. Come aboard were expecting you. Love life's sweetest reward Let it flow it floats back to you. If you have a problem if no one else can help and if you can find them maybe you can hire The A-Team. Here he comes Here comes Speed Racer. He's a demon on wheels. Well we're movin' on up to the east side to a deluxe apartment in the sky. Goodbye gray sky hello blue. There's nothing can hold me when I hold you. Feels so right it cant be wrong. Rockin' and rollin' all week long.

	Here's the story of a lovely lady who was bringing up three very lovely girls. The year is 1987 and NASA launches the last of Americas deep space probes. Well we're movin' on up to the east side to a deluxe apartment in the sky. Believe it or not I'm walking on air. I never thought I could feel so free. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me? Fish don't fry in the kitchen and beans don't burn on the grill. Took a whole lotta tryin' just to get up that hill. Makin their way the only way they know how. That's just a little bit more than the law will allow.

	All of them had hair of gold like their mother the youngest one in curls. Michael Knight a young loner on a crusade to champion the cause of the innocent. The helpless. The powerless in a world of criminals who operate above the law."

	It's a beautiful day in this neighborhood a beautiful day for a neighbor. Would you be mine? Could you be mine? Its a neighborly day in this beautywood a neighborly day for a beauty. Would you be mine? Could you be mine. We're gonna do it. On your mark get set and go now. Got a dream and we just know now we're gonna make our dream come true. Wouldn't you like to get away? Sometimes you want to go where everybody knows your name. And they're always glad you came. The ship set ground on the shore of this uncharted desert isle with Gilligan the Skipper too the millionaire and his wife. Makin their way the only way they know how. That's just a little bit more than the law will allow.

	Doin' it our way. There's nothing we wont try. Never heard the word impossible. This time there's no stopping us. The Brady Bunch the Brady Bunch that's the way we all became the Brady Bunch. black gold And we'll do it our way yes our way. Make all our dreams come true for me and you. So join us here each week my friends you're sure to get a smile from seven stranded castaways here on Gilligans Isle. Then one day he was shootin' at some food and up through the ground came a bubblin' crude. Oil that is. Come and knock on our door. We've been waiting for you. Where the kisses are hers and hers and his. Three's company too. The Love Boat soon will be making another run. The Love Boat promises something for everyone. Maybe you and me were never meant to be. But baby think of me once in awhile. I'm at WKRP in Cincinnati.
	        )

	    [6] => Array
	        (
	            [id] => 7
	            [title] => The Agile Waterfall
	            [description] => Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata corpora quaeritis. Summus brains sit??, morbo vel maleficia? De apocalypsi gorger omero undead survivor dictum mauris. Hi mindless mortuis soulless creaturas, imo evil stalking monstra adventus resi dentevil vultus comedat cerebella viventium. Qui animated corpse, cricket bat max brucks terribilem incessu zomby. The voodoo sacerdos flesh eater, suscitat mortuos comedere carnem virus. Zonbi tattered for solum oculi eorum defunctis go lum cerebro. Nescio brains an Undead zombies. Sicut malus putrid voodoo horror. Nigh tofth eliv ingdead.Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata corpora quaeritis. Summus brains sit??, morbo vel maleficia? De apocalypsi gorger omero undead survivor dictum mauris. Hi mindless mortuis soulless creaturas, imo evil stalking monstra adventus resi dentevil vultus comedat cerebella viventium. Qui animated corpse, cricket bat max brucks terribilem incessu zomby. The voodoo sacerdos flesh eater, suscitat mortuos comedere carnem virus. Zonbi tattered for solum oculi eorum defunctis go lum cerebro. Nescio brains an Undead zombies. Sicut malus putrid voodoo horror. Nigh tofth eliv ingdead.
	        )

	    [7] => Array
	        (
	            [id] => 8
	            [title] => Dev guide to new exciting Web Tech!
	            [description] => Williamsburg migas fap, pour-over before they sold out artisan typewriter selvage fixie meh Carles vinyl meggings stumptown +1. Messenger bag High Life Carles, ennui raw denim master cleanse cray ugh. Aesthetic put a bird on it DIY tote bag, umami wolf +1 church-key craft beer Vice pork belly dreamcatcher whatever asymmetrical PBR. Kickstarter YOLO Neutra hashtag lo-fi, health goth deep v ethical Tumblr heirloom craft beer. Single-origin coffee flexitarian bespoke tousled, post-ironic Echo Park put a bird on it letterpress aesthetic. Meggings butcher kale chips, actually Pitchfork Intelligentsia direct trade street art normcore brunch quinoa photo booth stumptown bitters. Asymmetrical hella trust fund, gastropub scenester heirloom squid next level Truffaut.

	Chia fanny pack paleo, yr VHS banjo McSweeney's. Artisan Pinterest tousled Tumblr, YOLO tilde seitan Bushwick sartorial photo booth drinking vinegar butcher flannel. Chillwave Carles you probably haven't heard of them, heirloom VHS iPhone American Apparel Pinterest locavore meditation Tumblr squid hoodie tattooed taxidermy. Hoodie locavore cray, banh mi post-ironic squid deep v +1 bitters fanny pack disrupt. Church-key food truck mixtape meditation heirloom. Raw denim church-key wayfarers McSweeney's Brooklyn, kale chips beard ugh Etsy tousled Banksy. Before they sold out slow-carb Pitchfork, fixie kale chips PBR Intelligentsia pug banh mi brunch flannel organic cardigan American Apparel.

	Art party biodiesel Bushwick, authentic Neutra twee bespoke scenester bicycle rights Wes Anderson church-key. Whatever you probably haven't heard of them small batch meditation American Apparel. Butcher lumbersexual selvage, tousled Neutra lomo distillery +1 salvia mumblecore Blue Bottle brunch. Biodiesel synth PBR, cred hella literally tote bag fanny pack art party Banksy. Actually twee quinoa 3 wolf moon. Helvetica narwhal next level banjo, XOXO DIY brunch kitsch four dollar toast taxidermy farm-to-table selfies. Sriracha Vice authentic squid.

	Four dollar toast kitsch chia crucifix. Roof party cliche lumbersexual ugh trust fund cardigan polaroid, artisan deep v fingerstache bicycle rights sartorial meditation locavore. Pug scenester photo booth Pinterest, migas pop-up beard XOXO keytar wolf DIY Shoreditch YOLO tilde. Locavore actually forage, single-origin coffee Thundercats tofu mustache slow-carb XOXO. Bespoke leggings organic, freegan chia direct trade skateboard banh mi before they sold out ugh lo-fi cred kale chips narwhal chambray. Forage four dollar toast irony mixtape wayfarers Etsy. Slow-carb fap tilde, McSweeney's vegan asymmetrical gluten-free American Apparel Pitchfork pork belly squid retro.
	        )

	    [8] => Array
	        (
	            [id] => 9
	            [title] => The .net Strin #23: Streamlining our Process
	            [description] => Lorizzle ipsum dolor fo shizzle amizzle, cool adipiscing elit. Nizzle sapien velizzle, volutpizzle, suscipit quizzle, gravida vizzle, arcu. Pellentesque crunk tortizzle. Its fo rizzle eros. Fusce izzle dolor crackalackin turpis tempizzle fo shizzle. Maurizzle pellentesque nibh et turpis. Fo shizzle izzle tortizzle. Pellentesque eleifend rhoncizzle shiznit. In hac you son of a bizzle tellivizzle dictumst. We gonna chung dapibizzle. Curabitizzle daahng dawg the bizzle, pretizzle crackalackin, mattizzle doggy, eleifend vitae, nunc. Owned suscipizzle. Shit dang tellivizzle sed shizzle my nizzle crocodizzle.

	Phasellizzle interdum volutpat ma nizzle. Ut fo adipiscing shiz. Mofo gangster cool. Dawg sapizzle bow wow wow, brizzle nizzle, accumsizzle doggy, fermentizzle quizzle, fo shizzle my nizzle. Hizzle nec libero. Rizzle rutrizzle shizznit ante. Shizzlin dizzle justo. Vestibulum we gonna chung rizzle nibh shizzle my nizzle crocodizzle commodo. Lorem boofron dolizzle sit bling bling, consectetuer adipiscing elit. Yippiyo izzle bizzle. Quisque shiznit black, i saw beyonces tizzles and my pizzle went crizzle et, dizzle a, eleifend a, my shizz.

	Crackalackin own yo' mi fo shizzle maurizzle posuere bibendizzle. Fo shizzle lacinia dang shit. Pot izzle dizzle izzle leo things euismizzle. Aliquam bling bling, maurizzle vitae daahng dawg convallis, nulla uhuh ... yih! shiz, et venenatizzle augue dang izzle ma nizzle. Vivamus shizznit lacizzle izzle ipsizzle. Pimpin' arcu go to hizzle, fermentizzle pizzle phat, faucibus gizzle, izzle, mauris. Sizzle sheezy laorizzle nibh. Vestibulum pizzle dizzle, hendrerit izzle, condimentum izzle, gizzle a, shizzle my nizzle crocodizzle. Morbi boofron placerat tellivizzle. Maecenas malesuada izzle i'm in the shizzle erizzle. Fo shizzle my nizzle metizzle sizzle, egestas eu, accumsizzle tellivizzle, elementizzle egizzle, neque. Nulla the bizzle nizzle a orci tincidunt sodales. Shizzle my nizzle crocodizzle boom shackalack, nulla egizzle crackalackin ass, mammasay mammasa mamma oo sa nizzle luctus erat, vitae augue purus nizzle arcu. I'm in the shizzle we gonna chung lacizzle. Nunc sizzle shizzle my nizzle crocodizzle. Duis izzle turpizzle. Fo shizzle a magna. Sizzle ghetto crackalackin, consectetuer id, shizzle my nizzle crocodizzle ac, fo shizzle izzle, dizzle. Nunc tellus. Crunk nisi erizzle, sure sizzle my shizz, doggy fo, tincidunt non, augue.

	Shit nizzle dizzle dizzle crunk pretizzle. Daahng dawg sit amizzle i saw beyonces tizzles and my pizzle went crizzle. Nizzle eu nisl boofron lacizzle bizzle feugizzle. Away suscipizzle viverra ipsizzle. Rizzle izzle arcu. Fo shizzle mah nizzle fo rizzle, mah home g-dizzle nizzle enizzle, auctor shizznit, shizzlin dizzle eu, owned nizzle, cool. Nullizzle things ma nizzle go to hizzle erizzle dawg pharetra. Mammasay mammasa mamma oo sa pede tortizzle, congue ghetto, auctor a, mollizzle sit my shizz, erat. Donizzle check it out dui. Aliquizzle risizzle away, fizzle consectetizzle, sollicitudin that's the shizzle, consequizzle fo shizzle, turpizzle. Quisque a ipsum eu i saw beyonces tizzles and my pizzle went 
	        )

	    [9] => Array
	        (
	            [id] => 10
	            [title] => 5 Killer ways to use Maps!
	            [description] => 	


	Select All Text	Submit your own Cat Ipsum copy!



	Jump around on couch, meow constantly until given food, stretch. I am the best. Chase imaginary bugs inspect anything brought into the house fall over dead (not really but gets sypathy) for spit up on light gray carpet instead of adjacent linoleum. Eat a plant, kill a hand. Use lap as chair who's the baby sweet beast knock over christmas tree but hate dog, yet love to play with owner's hair tie throwup on your pillow. Pelt around the house and up and down stairs chasing phantoms stare at ceiling caticus cuteicus. Knock dis off table head butt cant eat out of my own dish. Curl into a furry donut mark territory eat and than sleep on your face or claws in your leg so intrigued by the shower. Scratch leg; meow for can opener to feed me damn that dog yet see owner, run in terror shake treat bag, but give attitude, or use lap as chair. Find empty spot in cupboard and sleep all day spread kitty litter all over house. Chase red laser dot purr while eating make meme, make cute face has closed eyes but still sees you chase mice have secret plans i like big cats and i can not lie. Intently sniff hand. 

	Hopped up on catnip chew on cable lick butt meowing non stop for food but find empty spot in cupboard and sleep all day, yet have secret plans and kick up litter. Has closed eyes but still sees you have secret plans use lap as chair. Knock over christmas tree has closed eyes but still sees you jump around on couch, meow constantly until given food, yet cat snacks chase imaginary bugs. Behind the couch hack up furballs knock over christmas tree chew iPad power cord sun bathe scratch the furniture give attitude. Attack feet curl into a furry donut and pelt around the house and up and down stairs chasing phantoms present belly, scratch hand when stroked chase dog then run away. Pooping rainbow while flying in a toasted bread costume in space sleep on keyboard cough furball hide head under blanket so no one can see love to play with owner's hair tie and caticus cuteicus for knock dis off table head butt cant eat out of my own dish. Vommit food and eat it again. 

	Sleep in the bathroom sink eat grass, throw it back up. Hunt by meowing loudly at 5am next to human slave food dispenser sleep on keyboard. Find something else more interesting claws in your leg. Jump around on couch, meow constantly until given food, make meme, make cute face, but climb leg chase imaginary bugs, yet bathe private parts with tongue then lick owner's face. Eat and than sleep on your face chew iPad power cord caticus cuteicus but meow all night having their mate disturbing sleeping humans. Find empty spot in cupboard and sleep all day curl into a furry donut swat at dog, but stick butt in face lick butt. See owner, run in terror sweet beast. Meowing non stop for food if it fits, i sits. Climb leg hide from vacuum cleaner meow all night having their mate disturbing sleeping humans the dog smells bad curl into a furry donut. Hiss at vacuum cleaner leave dead animals as gifts sleep on keyboard chase imaginary bugs, sit by the fire eat a plant, kill a hand. Chase laser hunt by meowing loudly at 5am next to human slave food dispenser, hopped up on catnip hunt by meowing loudly at 5am next to human slave food dispenser and chase red laser dot stare at the wall, play with food and get confused by dust yet vommit food and eat it again. Kick up litter pelt around the house and up and down stairs chasing phantoms has closed eyes but still sees you. Sun bathe meowing non stop for food but pooping rainbow while flying in a toasted bread costume in space burrow under covers who's the baby. 

	        )

	    [10] => Array
	        (
	            [id] => 11
	            [title] => Josh Brewer on Inspiration
	            [description] => Williamsburg migas fap, pour-over before they sold out artisan typewriter selvage fixie meh Carles vinyl meggings stumptown +1. Messenger bag High Life Carles, ennui raw denim master cleanse cray ugh. Aesthetic put a bird on it DIY tote bag, umami wolf +1 church-key craft beer Vice pork belly dreamcatcher whatever asymmetrical PBR. Kickstarter YOLO Neutra hashtag lo-fi, health goth deep v ethical Tumblr heirloom craft beer. Single-origin coffee flexitarian bespoke tousled, post-ironic Echo Park put a bird on it letterpress aesthetic. Meggings butcher kale chips, actually Pitchfork Intelligentsia direct trade street art normcore brunch quinoa photo booth stumptown bitters. Asymmetrical hella trust fund, gastropub scenester heirloom squid next level Truffaut.

	Chia fanny pack paleo, yr VHS banjo McSweeney's. Artisan Pinterest tousled Tumblr, YOLO tilde seitan Bushwick sartorial photo booth drinking vinegar butcher flannel. Chillwave Carles you probably haven't heard of them, heirloom VHS iPhone American Apparel Pinterest locavore meditation Tumblr squid hoodie tattooed taxidermy. Hoodie locavore cray, banh mi post-ironic squid deep v +1 bitters fanny pack disrupt. Church-key food truck mixtape meditation heirloom. Raw denim church-key wayfarers McSweeney's Brooklyn, kale chips beard ugh Etsy tousled Banksy. Before they sold out slow-carb Pitchfork, fixie kale chips PBR Intelligentsia pug banh mi brunch flannel organic cardigan American Apparel.

	Art party biodiesel Bushwick, authentic Neutra twee bespoke scenester bicycle rights Wes Anderson church-key. Whatever you probably haven't heard of them small batch meditation American Apparel. Butcher lumbersexual selvage, tousled Neutra lomo distillery +1 salvia mumblecore Blue Bottle brunch. Biodiesel synth PBR, cred hella literally tote bag fanny pack art party Banksy. Actually twee quinoa 3 wolf moon. Helvetica narwhal next level banjo, XOXO DIY brunch kitsch four dollar toast taxidermy farm-to-table selfies. Sriracha Vice authentic squid.

	Four dollar toast kitsch chia crucifix. Roof party cliche lumbersexual ugh trust fund cardigan polaroid, artisan deep v fingerstache bicycle rights sartorial meditation locavore. Pug scenester photo booth Pinterest, migas pop-up beard XOXO keytar wolf DIY Shoreditch YOLO tilde. Locavore actually forage, single-origin coffee Thundercats tofu mustache slow-carb XOXO. Bespoke leggings organic, freegan chia direct trade skateboard banh mi before they sold out ugh lo-fi cred kale chips narwhal chambray. Forage four dollar toast irony mixtape wayfarers Etsy. Slow-carb fap tilde, McSweeney's vegan asymmetrical gluten-free American Apparel Pitchfork pork belly squid retro.
	        )

	    [11] => Array
	        (
	            [id] => 12
	            [title] => The Jeffrey Whey Way!
	            [description] => Williamsburg migas fap, pour-over before they sold out artisan typewriter selvage fixie meh Carles vinyl meggings stumptown +1. Messenger bag High Life Carles, ennui raw denim master cleanse cray ugh. Aesthetic put a bird on it DIY tote bag, umami wolf +1 church-key craft beer Vice pork belly dreamcatcher whatever asymmetrical PBR. Kickstarter YOLO Neutra hashtag lo-fi, health goth deep v ethical Tumblr heirloom craft beer. Single-origin coffee flexitarian bespoke tousled, post-ironic Echo Park put a bird on it letterpress aesthetic. Meggings butcher kale chips, actually Pitchfork Intelligentsia direct trade street art normcore brunch quinoa photo booth stumptown bitters. Asymmetrical hella trust fund, gastropub scenester heirloom squid next level Truffaut.

	Chia fanny pack paleo, yr VHS banjo McSweeney's. Artisan Pinterest tousled Tumblr, YOLO tilde seitan Bushwick sartorial photo booth drinking vinegar butcher flannel. Chillwave Carles you probably haven't heard of them, heirloom VHS iPhone American Apparel Pinterest locavore meditation Tumblr squid hoodie tattooed taxidermy. Hoodie locavore cray, banh mi post-ironic squid deep v +1 bitters fanny pack disrupt. Church-key food truck mixtape meditation heirloom. Raw denim church-key wayfarers McSweeney's Brooklyn, kale chips beard ugh Etsy tousled Banksy. Before they sold out slow-carb Pitchfork, fixie kale chips PBR Intelligentsia pug banh mi brunch flannel organic cardigan American Apparel.

	Art party biodiesel Bushwick, authentic Neutra twee bespoke scenester bicycle rights Wes Anderson church-key. Whatever you probably haven't heard of them small batch meditation American Apparel. Butcher lumbersexual selvage, tousled Neutra lomo distillery +1 salvia mumblecore Blue Bottle brunch. Biodiesel synth PBR, cred hella literally tote bag fanny pack art party Banksy. Actually twee quinoa 3 wolf moon. Helvetica narwhal next level banjo, XOXO DIY brunch kitsch four dollar toast taxidermy farm-to-table selfies. Sriracha Vice authentic squid.

	Four dollar toast kitsch chia crucifix. Roof party cliche lumbersexual ugh trust fund cardigan polaroid, artisan deep v fingerstache bicycle rights sartorial meditation locavore. Pug scenester photo booth Pinterest, migas pop-up beard XOXO keytar wolf DIY Shoreditch YOLO tilde. Locavore actually forage, single-origin coffee Thundercats tofu mustache slow-carb XOXO. Bespoke leggings organic, freegan chia direct trade skateboard banh mi before they sold out ugh lo-fi cred kale chips narwhal chambray. Forage four dollar toast irony mixtape wayfarers Etsy. Slow-carb fap tilde, McSweeney's vegan asymmetrical gluten-free American Apparel Pitchfork pork belly squid retro.
	        )

	    [12] => Array
	        (
	            [id] => 13
	            [title] => What will be better than HTML5?
	            [description] => Fish don't fry in the kitchen and beans don't burn on the grill. Took a whole lotta tryin' just to get up that hill. Go Speed Racer. Go Speed Racer. Go Speed Racer go. Love exciting and new. Come aboard were expecting you. Love life's sweetest reward Let it flow it floats back to you. If you have a problem if no one else can help and if you can find them maybe you can hire The A-Team. Here he comes Here comes Speed Racer. He's a demon on wheels. Well we're movin' on up to the east side to a deluxe apartment in the sky. Goodbye gray sky hello blue. There's nothing can hold me when I hold you. Feels so right it cant be wrong. Rockin' and rollin' all week long.

	Here's the story of a lovely lady who was bringing up three very lovely girls. The year is 1987 and NASA launches the last of Americas deep space probes. Well we're movin' on up to the east side to a deluxe apartment in the sky. Believe it or not I'm walking on air. I never thought I could feel so free. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me? Fish don't fry in the kitchen and beans don't burn on the grill. Took a whole lotta tryin' just to get up that hill. Makin their way the only way they know how. That's just a little bit more than the law will allow.

	All of them had hair of gold like their mother the youngest one in curls. Michael Knight a young loner on a crusade to champion the cause of the innocent. The helpless. The powerless in a world of criminals who operate above the law."

	It's a beautiful day in this neighborhood a beautiful day for a neighbor. Would you be mine? Could you be mine? Its a neighborly day in this beautywood a neighborly day for a beauty. Would you be mine? Could you be mine. We're gonna do it. On your mark get set and go now. Got a dream and we just know now we're gonna make our dream come true. Wouldn't you like to get away? Sometimes you want to go where everybody knows your name. And they're always glad you came. The ship set ground on the shore of this uncharted desert isle with Gilligan the Skipper too the millionaire and his wife. Makin their way the only way they know how. That's just a little bit more than the law will allow.

	Doin' it our way. There's nothing we wont try. Never heard the word impossible. This time there's no stopping us. The Brady Bunch the Brady Bunch that's the way we all became the Brady Bunch. black gold And we'll do it our way yes our way. Make all our dreams come true for me and you. So join us here each week my friends you're sure to get a smile from seven stranded castaways here on Gilligans Isle. Then one day he was shootin' at some food and up through the ground came a bubblin' crude. Oil that is. Come and knock on our door. We've been waiting for you. Where the kisses are hers and hers and his. Three's company too. The Love Boat soon will be making another run. The Love Boat promises something for everyone. Maybe you and me were never meant to be. But baby think of me once in awhile. I'm at WKRP in Cincinnati.
	        )

	    [13] => Array
	        (
	            [id] => 14
	            [title] => PHP will make a comeback!
	            [description] => Short loin shankle bresaola flank pork, swine pancetta. Porchetta ham hock strip steak sausage drumstick sirloin ribeye pork chicken filet mignon tail pork loin tenderloin turducken. Swine tongue ham hock ribeye strip steak venison kielbasa, tail kevin capicola. Pork doner bacon sirloin pork chop boudin.

	Pork t-bone tongue tenderloin pig prosciutto turducken strip steak shoulder pork belly cow jerky. Picanha shoulder hamburger kielbasa tenderloin doner spare ribs cow pork brisket shank turducken. Pork chop hamburger ham pancetta kielbasa jowl, venison meatloaf meatball. Chuck ball tip kevin turkey landjaeger, picanha pancetta boudin. Shankle ball tip biltong andouille pig bresaola. Andouille pork belly alcatra brisket cow sausage doner turkey. Turkey andouille cow ground round ribeye bresaola leberkas kielbasa flank fatback.

	Porchetta ham ground round andouille venison. Tri-tip turducken ball tip, pork belly cow strip steak bresaola fatback. Kielbasa pork belly pastrami sirloin, strip steak jowl meatloaf pork chop. Pancetta meatball tongue, leberkas flank short ribs tail chicken sausage corned beef fatback chuck ground round. Meatball hamburger sausage, kielbasa bacon beef short ribs. Tri-tip cupim ribeye leberkas frankfurter sirloin.

	Beef pig tail, shankle pork pancetta ribeye swine venison shank strip steak pork belly corned beef ham hock kevin. Cupim pork belly beef ribs pastrami picanha pork loin pork pancetta andouille rump kevin. Picanha porchetta turkey shankle biltong, tongue pastrami. Drumstick beef shankle, short loin rump ribeye chuck capicola doner.

	Beef ribs shank pig doner tail alcatra kielbasa sirloin t-bone cupim beef pork loin short loin. Bresaola chicken boudin, pig jowl cupim prosciutto. Fatback venison meatball, pork tail short ribs bacon short loin leberkas pastrami chicken shankle landjaeger bresaola. Sirloin ball tip sausage meatloaf turducken flank ground round t-bone rump. Tongue ground round jowl, doner shoulder meatball kielbasa bacon t-bone turkey swine pastrami.

	Does your lorem ipsum text long for something a little meatier? Give our generator a try… it’s tasty!
	        )

	    [14] => Array
	        (
	            [id] => 15
	            [title] => CMS is not a Mess
	            [description] => Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata corpora quaeritis. Summus brains sit??, morbo vel maleficia? De apocalypsi gorger omero undead survivor dictum mauris. Hi mindless mortuis soulless creaturas, imo evil stalking monstra adventus resi dentevil vultus comedat cerebella viventium. Qui animated corpse, cricket bat max brucks terribilem incessu zomby. The voodoo sacerdos flesh eater, suscitat mortuos comedere carnem virus. Zonbi tattered for solum oculi eorum defunctis go lum cerebro. Nescio brains an Undead zombies. Sicut malus putrid voodoo horror. Nigh tofth eliv ingdead.
	        )

	    [15] => Array
	        (
	            [id] => 16
	            [title] => What the SASS???
	            [description] => Carajillo, iced cappuccino mocha, white robusta wings as sweet, coffee, robust cultivar irish roast foam. Cultivar, as, turkish half and half, robust seasonal strong grounds, fair trade roast froth, doppio foam cup foam, cup, affogato spoon, organic kopi-luwak flavour seasonal barista sugar. Dark siphon extraction steamed wings, froth half and half frappuccino white, est, dark mug dark robust aged et french press. So single shot, cream pumpkin spice caffeine affogato, saucer qui carajillo in frappuccino, redeye aftertaste and cup body. Mug, frappuccino pumpkin spice, barista, irish caramelization plunger pot variety, galão foam, as single origin, cream, viennese seasonal, variety id kopi-luwak half and half filter iced. Aroma kopi-luwak medium cup saucer robust id aroma kopi-luwak brewed redeye, wings a caffeine black body crema black chicory dark macchiato sweet. Galão, aftertaste, steamed dark, macchiato a con panna, aromatic chicory flavour, steamed, dark affogato sugar, viennese, spoon, carajillo fair trade beans trifecta caramelization. Et decaffeinated, single origin roast est variety chicory turkish, plunger pot cup, macchiato french press, robusta aged siphon, blue mountain cup a galão americano.

	Grinder, half and half con panna froth acerbic, macchiato, cortado fair trade grinder white skinny barista americano extra fair trade wings redeye at crema dark. That, frappuccino carajillo so, skinny that cup single origin grounds seasonal robusta iced, java, single shot so, percolator, caramelization instant robusta wings doppio french press. Mazagran french press, medium crema, single shot cappuccino, galão affogato, caffeine, aftertaste est arabica, id, acerbic at half and half body steamed body instant. Rich eu americano est turkish that skinny chicory barista body half and half pumpkin spice latte robusta, aged, cup, filter a foam plunger pot lungo. Cup, mug lungo at coffee crema, ristretto, chicory brewed decaffeinated ut shop medium black, body, at pumpkin spice sugar con panna flavour coffee milk. Aged et macchiato beans percolator single shot cup sit, as mazagran crema that eu doppio robust barista. Aftertaste, white, single shot carajillo white skinny to go, cream affogato caffeine froth, breve macchiato as turkish to go lungo. Ut, aroma, espresso, affogato, café au lait beans viennese decaffeinated mazagran sit, est instant, that saucer, crema, body single origin, iced, decaffeinated dark in beans barista that.

	Carajillo whipped sugar flavour aroma, kopi-luwak cream single shot ut kopi-luwak arabica, latte, arabica skinny chicory macchiato dark id, at skinny steamed coffee single origin carajillo. Est, plunger pot dripper lungo, half and half sweet frappuccino froth java bar, caramelization cup roast, brewed, fair trade, caffeine lungo irish mug, and brewed mocha saucer rich. Percolator dark qui cream percolator qui grounds, cream spoon, eu, coffee robusta, extra skinny, ut, black java a medium aroma a at extraction. Instant turkish percolator grinder crema, dripper, milk espresso organic french press cream, con panna frappuccino wings rich, steamed dripper arabica steamed, java breve con panna lungo decaffeinated. Mocha, ut at instant trifecta single origin, mocha latte single origin turkish grounds sweet aroma. Decaffeinated, single origin robusta, crema affogato that single shot aged macchiato crema filter coffee carajillo, white flavour cup as flavour wings. Extraction, est macchiato, crema mazagran acerbic caramelization medium crema kopi-luwak et bar pumpkin spice blue mountain. Sweet, siphon, percolator flavour qui, arabica breve, irish roast java roast mug, black variety so kopi-luwak white cinnamon.

	Acerbic, spoon to go, mazagran coffee fair trade carajillo doppio americano pumpkin spice galão percolator coffee café au lait white. Mug latte rich single shot, blue mountain pumpkin spice, siphon ut french press caramelization trifecta, kopi-luwak, iced acerbic ristretto filter organic froth crema con panna. Turkish robusta ristretto white cultivar half and half brewed caffeine variety, percolator, french press, and beans bar, kopi-luwak aftertaste espresso half and half seasonal. Blue mountain, decaffeinated, grounds sugar galão aroma trifecta beans qui, latte arabica kopi-luwak body aged cinnamon body cream. A, saucer doppio, affogato bar, caffeine percolator robust, saucer cortado latte, cultivar white percolator, french press redeye carajillo aroma grinder black aroma robusta. Plunger pot french press spoon, that et foam extraction, café au lait half and half coffee aroma qui, breve and variety coffee mazagran plunger pot that. Latte extraction, foam cup doppio skinny beans espresso, whipped single shot flavour so et sit, organic macchiato, in plunger pot dripper blue mountain milk. Whipped shop strong ut, froth, rich, cortado, strong con panna breve, dark coffee dripper latte percolator so cup qui milk skinny fair trade doppio.
	        )

	)
)
*/

//I want to display the 4th Article Title in the database:
/* 
$rows = $query->fetchAll(PDO::FETCH_ASSOC);
echo $rows[4]['title']['description'];

echo '<pre>';
print_r($rows);
echo '</pre>';

Notice: Undefined offset: 3 in C:\xampp\htdocs\git-hub\php\working-files\pdo-db-query.php on line 421
Array
(
)
*/
//Adding LIMIT 6 control the number of rows/records to be retrieved from the table = 6
$query = $db->query("
 		SELECT `articles`.`title`
 		FROM `articles`
 		LIMIT 6
 	 ");



//Method Row Count
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	echo $row['title'], '</br>';
}
//Will print out the number of rows/records are in the table = 16
echo '<p>', $query->rowCOunt(), '</p>';


//Another scenario where rows can be deleted based on users that haven't used their acc for 12mnths. Deleted by clicking a button. We need to know how many records were deleted.

//Add the code to the query
//Update the echo statement
//Re-load the browser DO NOT REFRESH otherwise it wont work!
//Reload the PHPMyAdmin dbase table and the record with ID = 2 is gone
$query = $db->query("
 		DELETE FROM `articles`
 		WHERE `articles`.`id`
 		= 2
 	 ");

echo '<p>Deleted ', $query->rowCount(), ' articles.</p>';

//So, rowCount Method is very handy to use for other things like updating files anything that is modified.


//Explore the Last inserted ID Method

$db->query("
	INSERT INTO `articles`
	(`articles`.`title`)
	VALUES (PDO Tutorial)
");
header('Location: posts.php?id=' . $db->lastInsertId());
exit();




?>