<?php

class Animalshelter_Breed_Dog {
	/**
	 * @var string[]
	 */
	private array $breeds;

	public function __construct() {
		$this->breeds = array(
			'unknow' => array ( 'name' => __( 'Unknow', 'animal-shelter' ),
			'unknow' => array ( 'name' => __( 'Mongrel', 'animal-shelter' ),
			'afador' => array ( 'name' => __( 'Afador', 'animal-shelter' ),
			'affenhuahua' => array ( 'name' => __( 'Affenhuahua', 'animal-shelter' ),
			'affenpinscher' => array ( 'name' => __( 'Affenpinscher', 'animal-shelter' ),
			'afghan-hound' => array ( 'name' => __( 'Afghan Hound', 'animal-shelter' ),
			'airedale-terrier' => array ( 'name' => __( 'Airedale Terrier', 'animal-shelter' ),
			'akbash' => array ( 'name' => __( 'Akbash', 'animal-shelter' ),
			'akita' => array ( 'name' => __( 'Akita', 'animal-shelter' ),
			'akita-chow' => array ( 'name' => __( 'Akita Chow', 'animal-shelter' ),
			'akita-pit' => array ( 'name' => __( 'Akita Pit', 'animal-shelter' ),
			'akita-shepherd' => array ( 'name' => __( 'Akita Shepherd', 'animal-shelter' ),
			'alaskan-klee-kai' => array ( 'name' => __( 'Alaskan Klee Kai', 'animal-shelter' ),
			'alaskan-malamute' => array ( 'name' => __( 'Alaskan Malamute', 'animal-shelter' ),
			'american-bulldog' => array ( 'name' => __( 'American Bulldog', 'animal-shelter' ),
			'american-english-coonhound' => array ( 'name' => __( 'American English Coonhound', 'animal-shelter' ),
			'american-eskimo-dog' => array ( 'name' => __( 'American Eskimo Dog', 'animal-shelter' ),
			'american-foxhound' => array ( 'name' => __( 'American Foxhound', 'animal-shelter' ),
			'american-hairless-terrier' => array ( 'name' => __( 'American Hairless Terrier', 'animal-shelter' ),
			'american-leopard-hound' => array ( 'name' => __( 'American Leopard Hound', 'animal-shelter' ),
			'american-pit-bull-terrier' => array ( 'name' => __( 'American Pit Bull Terrier', 'animal-shelter' ),
			'american-pugabull' => array ( 'name' => __( 'American Pugabull', 'animal-shelter' ),
			'american-staffordshire-terrier' => array ( 'name' => __( 'American Staffordshire Terrier', 'animal-shelter' ),
			'american-water-spaniel' => array ( 'name' => __( 'American Water Spaniel', 'animal-shelter' ),
			'anatolian-shepherd-dog' => array ( 'name' => __( 'Anatolian Shepherd Dog', 'animal-shelter' ),
			'appenzeller-sennenhunde' => array ( 'name' => __( 'Appenzeller Sennenhunde', 'animal-shelter' ),
			'auggie' => array ( 'name' => __( 'Auggie', 'animal-shelter' ),
			'aussiedoodle' => array ( 'name' => __( 'Aussiedoodle', 'animal-shelter' ),
			'aussiepom' => array ( 'name' => __( 'Aussiepom', 'animal-shelter' ),
			'australian-cattle-dog' => array ( 'name' => __( 'Australian Cattle Dog', 'animal-shelter' ),
			'australian-kelpie' => array ( 'name' => __( 'Australian Kelpie', 'animal-shelter' ),
			'australian-retriever' => array ( 'name' => __( 'Australian Retriever', 'animal-shelter' ),
			'australian-shepherd' => array ( 'name' => __( 'Australian Shepherd', 'animal-shelter' ),
			'australian-shepherd-husky' => array ( 'name' => __( 'Australian Shepherd Husky', 'animal-shelter' ),
			'australian-shepherd-lab-mix' => array ( 'name' => __( 'Australian Shepherd Lab Mix', 'animal-shelter' ),
			'australian-shepherd-pit-bull-mix' => array ( 'name' => __( 'Australian Shepherd Pit Bull Mix', 'animal-shelter' ),
			'australian-stumpy-tail-cattle-dog' => array ( 'name' => __( 'Australian Stumpy Tail Cattle Dog', 'animal-shelter' ),
			'australian-terrier' => array ( 'name' => __( 'Australian Terrier', 'animal-shelter' ),
			'azawakh' => array ( 'name' => __( 'Azawakh', 'animal-shelter' ),
			'barbet' => array ( 'name' => __( 'Barbet', 'animal-shelter' ),
			'basenji' => array ( 'name' => __( 'Basenji', 'animal-shelter' ),
			'bassador' => array ( 'name' => __( 'Bassador', 'animal-shelter' ),
			'basset-fauve-de-bretagne' => array ( 'name' => __( 'Basset Fauve de Bretagne', 'animal-shelter' ),
			'basset-hound' => array ( 'name' => __( 'Basset Hound', 'animal-shelter' ),
			'basset-retriever' => array ( 'name' => __( 'Basset Retriever', 'animal-shelter' ),
			'bavarian-mountain-scent-hound' => array ( 'name' => __( 'Bavarian Mountain Scent Hound', 'animal-shelter' ),
			'beabull' => array ( 'name' => __( 'Beabull', 'animal-shelter' ),
			'beagle' => array ( 'name' => __( 'Beagle', 'animal-shelter' ),
			'beaglier' => array ( 'name' => __( 'Beaglier', 'animal-shelter' ),
			'bearded-collie' => array ( 'name' => __( 'Bearded Collie', 'animal-shelter' ),
			'bedlington-terrier' => array ( 'name' => __( 'Bedlington Terrier', 'animal-shelter' ),
			'belgian-laekenois' => array ( 'name' => __( 'Belgian Laekenois', 'animal-shelter' ),
			'belgian-malinois' => array ( 'name' => __( 'Belgian Malinois', 'animal-shelter' ),
			'belgian-sheepdog' => array ( 'name' => __( 'Belgian Sheepdog', 'animal-shelter' ),
			'belgian-tervuren' => array ( 'name' => __( 'Belgian Tervuren', 'animal-shelter' ),
			'bergamasco-sheepdog' => array ( 'name' => __( 'Bergamasco Sheepdog', 'animal-shelter' ),
			'berger-picard' => array ( 'name' => __( 'Berger Picard', 'animal-shelter' ),
			'bernedoodle' => array ( 'name' => __( 'Bernedoodle', 'animal-shelter' ),
			'bernese-mountain-dog' => array ( 'name' => __( 'Bernese Mountain Dog', 'animal-shelter' ),
			'bichon-frise' => array ( 'name' => __( 'Bichon Frise', 'animal-shelter' ),
			'biewer-terrier' => array ( 'name' => __( 'Biewer Terrier', 'animal-shelter' ),
			'black-and-tan-coonhound' => array ( 'name' => __( 'Black and Tan Coonhound', 'animal-shelter' ),
			'black-mouth-cur' => array ( 'name' => __( 'Black Mouth Cur', 'animal-shelter' ),
			'black-russian-terrier' => array ( 'name' => __( 'Black Russian Terrier', 'animal-shelter' ),
			'bloodhound' => array ( 'name' => __( 'Bloodhound', 'animal-shelter' ),
			'blue-lacy' => array ( 'name' => __( 'Blue Lacy', 'animal-shelter' ),
			'bluetick-coonhound' => array ( 'name' => __( 'Bluetick Coonhound', 'animal-shelter' ),
			'bocker' => array ( 'name' => __( 'Bocker', 'animal-shelter' ),
			'boerboel' => array ( 'name' => __( 'Boerboel', 'animal-shelter' ),
			'boglen-terrier' => array ( 'name' => __( 'Boglen Terrier', 'animal-shelter' ),
			'bohemian-shepherd' => array ( 'name' => __( 'Bohemian Shepherd', 'animal-shelter' ),
			'bolognese' => array ( 'name' => __( 'Bolognese', 'animal-shelter' ),
			'borador' => array ( 'name' => __( 'Borador', 'animal-shelter' ),
			'border-collie' => array ( 'name' => __( 'Border Collie', 'animal-shelter' ),
			'border-sheepdog' => array ( 'name' => __( 'Border Sheepdog', 'animal-shelter' ),
			'border-terrier' => array ( 'name' => __( 'Border Terrier', 'animal-shelter' ),
			'bordoodle' => array ( 'name' => __( 'Bordoodle', 'animal-shelter' ),
			'borzoi' => array ( 'name' => __( 'Borzoi', 'animal-shelter' ),
			'boshih' => array ( 'name' => __( 'BoShih', 'animal-shelter' ),
			'bossie' => array ( 'name' => __( 'Bossie', 'animal-shelter' ),
			'boston-boxer' => array ( 'name' => __( 'Boston Boxer', 'animal-shelter' ),
			'boston-terrier' => array ( 'name' => __( 'Boston Terrier', 'animal-shelter' ),
			'boston-terrier-pekingese-mix' => array ( 'name' => __( 'Boston Terrier Pekingese Mix', 'animal-shelter' ),
			'bouvier-des-flandres' => array ( 'name' => __( 'Bouvier des Flandres', 'animal-shelter' ),
			'boxador' => array ( 'name' => __( 'Boxador', 'animal-shelter' ),
			'boxer' => array ( 'name' => __( 'Boxer', 'animal-shelter' ),
			'boxerdoodle' => array ( 'name' => __( 'Boxerdoodle', 'animal-shelter' ),
			'boxmatian' => array ( 'name' => __( 'Boxmatian', 'animal-shelter' ),
			'boxweiler' => array ( 'name' => __( 'Boxweiler', 'animal-shelter' ),
			'boykin-spaniel' => array ( 'name' => __( 'Boykin Spaniel', 'animal-shelter' ),
			'bracco-italiano' => array ( 'name' => __( 'Bracco Italiano', 'animal-shelter' ),
			'braque-du-bourbonnais' => array ( 'name' => __( 'Braque du Bourbonnais', 'animal-shelter' ),
			'briard' => array ( 'name' => __( 'Briard', 'animal-shelter' ),
			'brittany' => array ( 'name' => __( 'Brittany', 'animal-shelter' ),
			'broholmer' => array ( 'name' => __( 'Broholmer', 'animal-shelter' ),
			'brussels-griffon' => array ( 'name' => __( 'Brussels Griffon', 'animal-shelter' ),
			'bugg' => array ( 'name' => __( 'Bugg', 'animal-shelter' ),
			'bull-arab' => array ( 'name' => __( 'Bull Arab', 'animal-shelter' ),
			'bull-terrier' => array ( 'name' => __( 'Bull Terrier', 'animal-shelter' ),
			'bullador' => array ( 'name' => __( 'Bullador', 'animal-shelter' ),
			'bullboxer-pit' => array ( 'name' => __( 'Bullboxer Pit', 'animal-shelter' ),
			'bulldog' => array ( 'name' => __( 'Bulldog', 'animal-shelter' ),
			'bullmastiff' => array ( 'name' => __( 'Bullmastiff', 'animal-shelter' ),
			'bullmatian' => array ( 'name' => __( 'Bullmatian', 'animal-shelter' ),
			'bull-pei' => array ( 'name' => __( 'Bull-Pei', 'animal-shelter' ),
			'cairn-terrier' => array ( 'name' => __( 'Cairn Terrier', 'animal-shelter' ),
			'canaan-dog' => array ( 'name' => __( 'Canaan Dog', 'animal-shelter' ),
			'cane-corso' => array ( 'name' => __( 'Cane Corso', 'animal-shelter' ),
			'cardigan-welsh-corgi' => array ( 'name' => __( 'Cardigan Welsh Corgi', 'animal-shelter' ),
			'carolina-dog' => array ( 'name' => __( 'Carolina Dog', 'animal-shelter' ),
			'catahoula-bulldog' => array ( 'name' => __( 'Catahoula Bulldog', 'animal-shelter' ),
			'catahoula-leopard-dog' => array ( 'name' => __( 'Catahoula Leopard Dog', 'animal-shelter' ),
			'caucasian-shepherd-dog' => array ( 'name' => __( 'Caucasian Shepherd Dog', 'animal-shelter' ),
			'cavachon' => array ( 'name' => __( 'Cavachon', 'animal-shelter' ),
			'cavador' => array ( 'name' => __( 'Cavador', 'animal-shelter' ),
			'cav-a-jack' => array ( 'name' => __( 'Cav-a-Jack', 'animal-shelter' ),
			'cavalier-king-charles-spaniel' => array ( 'name' => __( 'Cavalier King Charles Spaniel', 'animal-shelter' ),
			'cavapoo' => array ( 'name' => __( 'Cavapoo', 'animal-shelter' ),
			'central-asian-shepherd-dog' => array ( 'name' => __( 'Central Asian Shepherd Dog', 'animal-shelter' ),
			'cesky-terrier' => array ( 'name' => __( 'Cesky Terrier', 'animal-shelter' ),
			'chabrador' => array ( 'name' => __( 'Chabrador', 'animal-shelter' ),
			'cheagle' => array ( 'name' => __( 'Cheagle', 'animal-shelter' ),
			'chesapeake-bay-retriever' => array ( 'name' => __( 'Chesapeake Bay Retriever', 'animal-shelter' ),
			'chi-chi' => array ( 'name' => __( 'Chi Chi', 'animal-shelter' ),
			'chigi' => array ( 'name' => __( 'Chigi', 'animal-shelter' ),
			'chihuahua' => array ( 'name' => __( 'Chihuahua', 'animal-shelter' ),
			'chilier' => array ( 'name' => __( 'Chilier', 'animal-shelter' ),
			'chinese-crested' => array ( 'name' => __( 'Chinese Crested', 'animal-shelter' ),
			'chinese-shar-pei' => array ( 'name' => __( 'Chinese Shar-Pei', 'animal-shelter' ),
			'chinook' => array ( 'name' => __( 'Chinook', 'animal-shelter' ),
			'chion' => array ( 'name' => __( 'Chion', 'animal-shelter' ),
			'chipi' => array ( 'name' => __( 'Chipi', 'animal-shelter' ),
			'chi-poo' => array ( 'name' => __( 'Chi-Poo', 'animal-shelter' ),
			'chiweenie' => array ( 'name' => __( 'Chiweenie', 'animal-shelter' ),
			'chorkie' => array ( 'name' => __( 'Chorkie', 'animal-shelter' ),
			'chow-chow' => array ( 'name' => __( 'Chow Chow', 'animal-shelter' ),
			'chow-shepherd' => array ( 'name' => __( 'Chow Shepherd', 'animal-shelter' ),
			'chug' => array ( 'name' => __( 'Chug', 'animal-shelter' ),
			'chusky' => array ( 'name' => __( 'Chusky', 'animal-shelter' ),
			'cirneco-della-etna' => array ( 'name' => __( 'Cirneco dellâ\'Etna', 'animal-shelter' ),
			'clumber-spaniel' => array ( 'name' => __( 'Clumber Spaniel', 'animal-shelter' ),
			'cockalier' => array ( 'name' => __( 'Cockalier', 'animal-shelter' ),
			'cockapoo' => array ( 'name' => __( 'Cockapoo', 'animal-shelter' ),
			'cocker-spaniel' => array ( 'name' => __( 'Cocker Spaniel', 'animal-shelter' ),
			'collie' => array ( 'name' => __( 'Collie', 'animal-shelter' ),
			'corgi-inu' => array ( 'name' => __( 'Corgi Inu', 'animal-shelter' ),
			'corgidor' => array ( 'name' => __( 'Corgidor', 'animal-shelter' ),
			'corman-shepherd' => array ( 'name' => __( 'Corman Shepherd', 'animal-shelter' ),
			'coton-de-tulear' => array ( 'name' => __( 'Coton de Tulear', 'animal-shelter' ),
			'croatian-sheepdog' => array ( 'name' => __( 'Croatian Sheepdog', 'animal-shelter' ),
			'curly-coated-retriever' => array ( 'name' => __( 'Curly-Coated Retriever', 'animal-shelter' ),
			'dachsador' => array ( 'name' => __( 'Dachsador', 'animal-shelter' ),
			'dachshund' => array ( 'name' => __( 'Dachshund', 'animal-shelter' ),
			'dalmatian' => array ( 'name' => __( 'Dalmatian', 'animal-shelter' ),
			'dandie-dinmont-terrier' => array ( 'name' => __( 'Dandie Dinmont Terrier', 'animal-shelter' ),
			'daniff' => array ( 'name' => __( 'Daniff', 'animal-shelter' ),
			'danish-swedish-farmdog' => array ( 'name' => __( 'Danish-Swedish Farmdog', 'animal-shelter' ),
			'deutscher-wachtelhund' => array ( 'name' => __( 'Deutscher Wachtelhund', 'animal-shelter' ),
			'doberdor' => array ( 'name' => __( 'Doberdor', 'animal-shelter' ),
			'doberman-pinscher' => array ( 'name' => __( 'Doberman Pinscher', 'animal-shelter' ),
			'docker' => array ( 'name' => __( 'Docker', 'animal-shelter' ),
			'dogo-argentino' => array ( 'name' => __( 'Dogo Argentino', 'animal-shelter' ),
			'dogue-de-bordeaux' => array ( 'name' => __( 'Dogue de Bordeaux', 'animal-shelter' ),
			'dorgi' => array ( 'name' => __( 'Dorgi', 'animal-shelter' ),
			'dorkie' => array ( 'name' => __( 'Dorkie', 'animal-shelter' ),
			'doxiepoo' => array ( 'name' => __( 'Doxiepoo', 'animal-shelter' ),
			'doxle' => array ( 'name' => __( 'Doxle', 'animal-shelter' ),
			'drentsche-patrijshond' => array ( 'name' => __( 'Drentsche Patrijshond', 'animal-shelter' ),
			'drever' => array ( 'name' => __( 'Drever', 'animal-shelter' ),
			'dutch-shepherd' => array ( 'name' => __( 'Dutch Shepherd', 'animal-shelter' ),
			'english-cocker-spaniel' => array ( 'name' => __( 'English Cocker Spaniel', 'animal-shelter' ),
			'english-foxhound' => array ( 'name' => __( 'English Foxhound', 'animal-shelter' ),
			'english-setter' => array ( 'name' => __( 'English Setter', 'animal-shelter' ),
			'english-springer-spaniel' => array ( 'name' => __( 'English Springer Spaniel', 'animal-shelter' ),
			'english-toy-spaniel' => array ( 'name' => __( 'English Toy Spaniel', 'animal-shelter' ),
			'entlebucher-mountain-dog' => array ( 'name' => __( 'Entlebucher Mountain Dog', 'animal-shelter' ),
			'estrela-mountain-dog' => array ( 'name' => __( 'Estrela Mountain Dog', 'animal-shelter' ),
			'eurasier' => array ( 'name' => __( 'Eurasier', 'animal-shelter' ),
			'field-spaniel' => array ( 'name' => __( 'Field Spaniel', 'animal-shelter' ),
			'fila-brasileiro' => array ( 'name' => __( 'Fila Brasileiro', 'animal-shelter' ),
			'finnish-lapphund' => array ( 'name' => __( 'Finnish Lapphund', 'animal-shelter' ),
			'finnish-spitz' => array ( 'name' => __( 'Finnish Spitz', 'animal-shelter' ),
			'flat-coated-retriever' => array ( 'name' => __( 'Flat-Coated Retriever', 'animal-shelter' ),
			'fox-terrier' => array ( 'name' => __( 'Fox Terrier', 'animal-shelter' ),
			'french-bulldog' => array ( 'name' => __( 'French Bulldog', 'animal-shelter' ),
			'french-bullhuahua' => array ( 'name' => __( 'French Bullhuahua', 'animal-shelter' ),
			'french-spaniel' => array ( 'name' => __( 'French Spaniel', 'animal-shelter' ),
			'frenchton' => array ( 'name' => __( 'Frenchton', 'animal-shelter' ),
			'frengle' => array ( 'name' => __( 'Frengle', 'animal-shelter' ),
			'german-longhaired-pointer' => array ( 'name' => __( 'German Longhaired Pointer', 'animal-shelter' ),
			'german-pinscher' => array ( 'name' => __( 'German Pinscher', 'animal-shelter' ),
			'german-shepherd-dog' => array ( 'name' => __( 'German Shepherd Dog', 'animal-shelter' ),
			'german-shepherd-pit-bull' => array ( 'name' => __( 'German Shepherd Pit Bull', 'animal-shelter' ),
			'german-shepherd-rottweiler-mix' => array ( 'name' => __( 'German Shepherd Rottweiler Mix', 'animal-shelter' ),
			'german-sheprador' => array ( 'name' => __( 'German Sheprador', 'animal-shelter' ),
			'german-shorthaired-pointer' => array ( 'name' => __( 'German Shorthaired Pointer', 'animal-shelter' ),
			'german-spitz' => array ( 'name' => __( 'German Spitz', 'animal-shelter' ),
			'german-wirehaired-pointer' => array ( 'name' => __( 'German Wirehaired Pointer', 'animal-shelter' ),
			'giant-schnauzer' => array ( 'name' => __( 'Giant Schnauzer', 'animal-shelter' ),
			'glen-of-imaal-terrier' => array ( 'name' => __( 'Glen of Imaal Terrier', 'animal-shelter' ),
			'goberian' => array ( 'name' => __( 'Goberian', 'animal-shelter' ),
			'goldador' => array ( 'name' => __( 'Goldador', 'animal-shelter' ),
			'golden-cocker-retriever' => array ( 'name' => __( 'Golden Cocker Retriever', 'animal-shelter' ),
			'golden-mountain-dog' => array ( 'name' => __( 'Golden Mountain Dog', 'animal-shelter' ),
			'golden-retriever' => array ( 'name' => __( 'Golden Retriever', 'animal-shelter' ),
			'golden-retriever-corgi' => array ( 'name' => __( 'Golden Retriever Corgi', 'animal-shelter' ),
			'golden-shepherd' => array ( 'name' => __( 'Golden Shepherd', 'animal-shelter' ),
			'goldendoodle' => array ( 'name' => __( 'Goldendoodle', 'animal-shelter' ),
			'gollie' => array ( 'name' => __( 'Gollie', 'animal-shelter' ),
			'gordon-setter' => array ( 'name' => __( 'Gordon Setter', 'animal-shelter' ),
			'great-dane' => array ( 'name' => __( 'Great Dane', 'animal-shelter' ),
			'great-pyrenees' => array ( 'name' => __( 'Great Pyrenees', 'animal-shelter' ),
			'greater-swiss-mountain-dog' => array ( 'name' => __( 'Greater Swiss Mountain Dog', 'animal-shelter' ),
			'greyador' => array ( 'name' => __( 'Greyador', 'animal-shelter' ),
			'greyhound' => array ( 'name' => __( 'Greyhound', 'animal-shelter' ),
			'hamiltonstovare' => array ( 'name' => __( 'Hamiltonstovare', 'animal-shelter' ),
			'hanoverian-scenthound' => array ( 'name' => __( 'Hanoverian Scenthound', 'animal-shelter' ),
			'harrier' => array ( 'name' => __( 'Harrier', 'animal-shelter' ),
			'havanese' => array ( 'name' => __( 'Havanese', 'animal-shelter' ),
			'havanese' => array ( 'name' => __( 'Havapoo', 'animal-shelter' ),
			'hokkaido' => array ( 'name' => __( 'Hokkaido', 'animal-shelter' ),
			'horgi' => array ( 'name' => __( 'Horgi', 'animal-shelter' ),
			'hovawart' => array ( 'name' => __( 'Hovawart', 'animal-shelter' ),
			'huskita' => array ( 'name' => __( 'Huskita', 'animal-shelter' ),
			'huskydoodle' => array ( 'name' => __( 'Huskydoodle', 'animal-shelter' ),
			'ibizan-hound' => array ( 'name' => __( 'Ibizan Hound', 'animal-shelter' ),
			'icelandic-sheepdog' => array ( 'name' => __( 'Icelandic Sheepdog', 'animal-shelter' ),
			'irish-red-and-white-setter' => array ( 'name' => __( 'Irish Red And White Setter', 'animal-shelter' ),
			'irish-setter' => array ( 'name' => __( 'Irish Setter', 'animal-shelter' ),
			'irish-terrier' => array ( 'name' => __( 'Irish Terrier', 'animal-shelter' ),
			'irish-water-spaniel' => array ( 'name' => __( 'Irish Water Spaniel', 'animal-shelter' ),
			'irish-wolfhound' => array ( 'name' => __( 'Irish Wolfhound', 'animal-shelter' ),
			'italian-greyhound' => array ( 'name' => __( 'Italian Greyhound', 'animal-shelter' ),
			'jack-chi' => array ( 'name' => __( 'Jack Chi', 'animal-shelter' ),
			'jack-russell-terrier' => array ( 'name' => __( 'Jack Russell Terrier', 'animal-shelter' ),
			'jack-a-poo' => array ( 'name' => __( 'Jack-A-Poo', 'animal-shelter' ),
			'jackshund' => array ( 'name' => __( 'Jackshund', 'animal-shelter' ),
			'japanese-chin' => array ( 'name' => __( 'Japanese Chin', 'animal-shelter' ),
			'japanese-spitz' => array ( 'name' => __( 'Japanese Spitz', 'animal-shelter' ),
			'kai-ken' => array ( 'name' => __( 'Kai Ken', 'animal-shelter' ),
			'karelian-bear-dog' => array ( 'name' => __( 'Karelian Bear Dog', 'animal-shelter' ),
			'keeshond' => array ( 'name' => __( 'Keeshond', 'animal-shelter' ),
			'kerry-blue-terrier' => array ( 'name' => __( 'Kerry Blue Terrier', 'animal-shelter' ),
			'king-shepherd' => array ( 'name' => __( 'King Shepherd', 'animal-shelter' ),
			'kishu-ken' => array ( 'name' => __( 'Kishu Ken', 'animal-shelter' ),
			'komondor' => array ( 'name' => __( 'Komondor', 'animal-shelter' ),
			'kooikerhondje' => array ( 'name' => __( 'Kooikerhondje', 'animal-shelter' ),
			'korean-jindo-dog' => array ( 'name' => __( 'Korean Jindo Dog', 'animal-shelter' ),
			'kuvasz' => array ( 'name' => __( 'Kuvasz', 'animal-shelter' ),
			'kyi-leo' => array ( 'name' => __( 'Kyi-Leo', 'animal-shelter' ),
			'lab-pointer' => array ( 'name' => __( 'Lab Pointer', 'animal-shelter' ),
			'labernese' => array ( 'name' => __( 'Labernese', 'animal-shelter' ),
			'labmaraner' => array ( 'name' => __( 'Labmaraner', 'animal-shelter' ),
			'labrabull' => array ( 'name' => __( 'Labrabull', 'animal-shelter' ),
			'labradane' => array ( 'name' => __( 'Labradane', 'animal-shelter' ),
			'labradoodle' => array ( 'name' => __( 'Labradoodle', 'animal-shelter' ),
			'labrador-retriever' => array ( 'name' => __( 'Labrador Retriever', 'animal-shelter' ),
			'labrastaff' => array ( 'name' => __( 'Labrastaff', 'animal-shelter' ),
			'labsky' => array ( 'name' => __( 'Labsky', 'animal-shelter' ),
			'lagotto-romagnolo' => array ( 'name' => __( 'Lagotto Romagnolo', 'animal-shelter' ),
			'lakeland-terrier' => array ( 'name' => __( 'Lakeland Terrier', 'animal-shelter' ),
			'lancashire-heeler' => array ( 'name' => __( 'Lancashire Heeler', 'animal-shelter' ),
			'leonberger' => array ( 'name' => __( 'Leonberger', 'animal-shelter' ),
			'lhasa-apso' => array ( 'name' => __( 'Lhasa Apso', 'animal-shelter' ),
			'lhasapoo' => array ( 'name' => __( 'Lhasapoo', 'animal-shelter' ),
			'lowchen' => array ( 'name' => __( 'Lowchen', 'animal-shelter' ),
			'maltese' => array ( 'name' => __( 'Maltese', 'animal-shelter' ),
			'maltese-shih-tzu' => array ( 'name' => __( 'Maltese Shih Tzu', 'animal-shelter' ),
			'maltipoo' => array ( 'name' => __( 'Maltipoo', 'animal-shelter' ),
			'manchester-terrier' => array ( 'name' => __( 'Manchester Terrier', 'animal-shelter' ),
			'maremma-sheepdog' => array ( 'name' => __( 'Maremma Sheepdog', 'animal-shelter' ),
			'mastador' => array ( 'name' => __( 'Mastador', 'animal-shelter' ),
			'mastiff' => array ( 'name' => __( 'Mastiff', 'animal-shelter' ),
			'miniature-pinscher' => array ( 'name' => __( 'Miniature Pinscher', 'animal-shelter' ),
			'miniature-schnauzer' => array ( 'name' => __( 'Miniature Schnauzer', 'animal-shelter' ),
			'morkie' => array ( 'name' => __( 'Morkie', 'animal-shelter' ),
			'mountain-cur' => array ( 'name' => __( 'Mountain Cur', 'animal-shelter' ),
			'mountain-feist' => array ( 'name' => __( 'Mountain Feist', 'animal-shelter' ),
			'mudi' => array ( 'name' => __( 'Mudi', 'animal-shelter' ),
			'neapolitan-mastiff' => array ( 'name' => __( 'Neapolitan Mastiff', 'animal-shelter' ),
			'newfoundland' => array ( 'name' => __( 'Newfoundland', 'animal-shelter' ),
			'norfolk-terrier' => array ( 'name' => __( 'Norfolk Terrier', 'animal-shelter' ),
			'northern-inuit-dog' => array ( 'name' => __( 'Northern Inuit Dog', 'animal-shelter' ),
			'norwegian-buhund' => array ( 'name' => __( 'Norwegian Buhund', 'animal-shelter' ),
			'norwegian-elkhound' => array ( 'name' => __( 'Norwegian Elkhound', 'animal-shelter' ),
			'norwegian-lundehund' => array ( 'name' => __( 'Norwegian Lundehund', 'animal-shelter' ),
			'norwich-terrier' => array ( 'name' => __( 'Norwich Terrier', 'animal-shelter' ),
			'nova-scotia-duck-tolling-retriever' => array ( 'name' => __( 'Nova Scotia Duck Tolling Retriever', 'animal-shelter' ),
			'old-english-sheepdog' => array ( 'name' => __( 'Old English Sheepdog', 'animal-shelter' ),
			'otterhound' => array ( 'name' => __( 'Otterhound', 'animal-shelter' ),
			'papillon' => array ( 'name' => __( 'Papillon', 'animal-shelter' ),
			'papipoo' => array ( 'name' => __( 'Papipoo', 'animal-shelter' ),
			'patterdale-terrier' => array ( 'name' => __( 'Patterdale Terrier', 'animal-shelter' ),
			'peekapoo' => array ( 'name' => __( 'Peekapoo', 'animal-shelter' ),
			'pekingese' => array ( 'name' => __( 'Pekingese', 'animal-shelter' ),
			'pembroke-welsh-corgi' => array ( 'name' => __( 'Pembroke Welsh Corgi', 'animal-shelter' ),
			'petit basset griffon vend-en' => array ( 'name' => __( 'Petit Basset Griffon Vend\'en', 'animal-shelter' ),
			'pharaoh-hound' => array ( 'name' => __( 'Pharaoh Hound', 'animal-shelter' ),
			'pitsky' => array ( 'name' => __( 'Pitsky', 'animal-shelter' ),
			'plott' => array ( 'name' => __( 'Plott', 'animal-shelter' ),
			'pocket-beagle' => array ( 'name' => __( 'Pocket Beagle', 'animal-shelter' ),
			'pointer' => array ( 'name' => __( 'Pointer', 'animal-shelter' ),
			'polish-lowland-sheepdog' => array ( 'name' => __( 'Polish Lowland Sheepdog', 'animal-shelter' ),
			'pomapoo' => array ( 'name' => __( 'Pomapoo', 'animal-shelter' ),
			'pomchi' => array ( 'name' => __( 'Pomchi', 'animal-shelter' ),
			'pomeagle' => array ( 'name' => __( 'Pomeagle', 'animal-shelter' ),
			'pomeranian' => array ( 'name' => __( 'Pomeranian', 'animal-shelter' ),
			'pomsky' => array ( 'name' => __( 'Pomsky', 'animal-shelter' ),
			'poochon' => array ( 'name' => __( 'Poochon', 'animal-shelter' ),
			'poodle' => array ( 'name' => __( 'Poodle', 'animal-shelter' ),
			'portuguese-podengo-pequeno' => array ( 'name' => __( 'Portuguese Podengo Pequeno', 'animal-shelter' ),
			'portuguese-pointer' => array ( 'name' => __( 'Portuguese Pointer', 'animal-shelter' ),
			'portuguese-sheepdog' => array ( 'name' => __( 'Portuguese Sheepdog', 'animal-shelter' ),
			'portuguese-water-dog' => array ( 'name' => __( 'Portuguese Water Dog', 'animal-shelter' ),
			'pudelpointer' => array ( 'name' => __( 'Pudelpointer', 'animal-shelter' ),
			'pug' => array ( 'name' => __( 'Pug', 'animal-shelter' ),
			'pugalier' => array ( 'name' => __( 'Pugalier', 'animal-shelter' ),
			'puggle' => array ( 'name' => __( 'Puggle', 'animal-shelter' ),
			'puginese' => array ( 'name' => __( 'Puginese', 'animal-shelter' ),
			'puli' => array ( 'name' => __( 'Puli', 'animal-shelter' ),
			'pyredoodle' => array ( 'name' => __( 'Pyredoodle', 'animal-shelter' ),
			'pyrenean-mastiff' => array ( 'name' => __( 'Pyrenean Mastiff', 'animal-shelter' ),
			'pyrenean-shepherd' => array ( 'name' => __( 'Pyrenean Shepherd', 'animal-shelter' ),
			'rat-terrier' => array ( 'name' => __( 'Rat Terrier', 'animal-shelter' ),
			'redbone-coonhound' => array ( 'name' => __( 'Redbone Coonhound', 'animal-shelter' ),
			'rhodesian-ridgeback' => array ( 'name' => __( 'Rhodesian Ridgeback', 'animal-shelter' ),
			'rottador' => array ( 'name' => __( 'Rottador', 'animal-shelter' ),
			'rottle' => array ( 'name' => __( 'Rottle', 'animal-shelter' ),
			'rottweiler' => array ( 'name' => __( 'Rottweiler', 'animal-shelter' ),
			'saint-berdoodle' => array ( 'name' => __( 'Saint Berdoodle', 'animal-shelter' ),
			'saint-bernard' => array ( 'name' => __( 'Saint Bernard', 'animal-shelter' ),
			'saluki' => array ( 'name' => __( 'Saluki', 'animal-shelter' ),
			'samoyed' => array ( 'name' => __( 'Samoyed', 'animal-shelter' ),
			'samusky' => array ( 'name' => __( 'Samusky', 'animal-shelter' ),
			'schipperke' => array ( 'name' => __( 'Schipperke', 'animal-shelter' ),
			'schnoodle' => array ( 'name' => __( 'Schnoodle', 'animal-shelter' ),
			'scottish-deerhound' => array ( 'name' => __( 'Scottish Deerhound', 'animal-shelter' ),
			'scottish-terrier' => array ( 'name' => __( 'Scottish Terrier', 'animal-shelter' ),
			'sealyham-terrier' => array ( 'name' => __( 'Sealyham Terrier', 'animal-shelter' ),
			'sheepadoodle' => array ( 'name' => __( 'Sheepadoodle', 'animal-shelter' ),
			'shepsky' => array ( 'name' => __( 'Shepsky', 'animal-shelter' ),
			'shetland-sheepdog' => array ( 'name' => __( 'Shetland Sheepdog', 'animal-shelter' ),
			'shiba-inu' => array ( 'name' => __( 'Shiba Inu', 'animal-shelter' ),
			'shichon' => array ( 'name' => __( 'Shichon', 'animal-shelter' ),
			'shih-tzu' => array ( 'name' => __( 'Shih Tzu', 'animal-shelter' ),
			'shih-poo' => array ( 'name' => __( 'Shih-Poo', 'animal-shelter' ),
			'shikoku' => array ( 'name' => __( 'Shikoku', 'animal-shelter' ),
			'shiloh-shepherd' => array ( 'name' => __( 'Shiloh Shepherd', 'animal-shelter' ),
			'shiranian' => array ( 'name' => __( 'Shiranian', 'animal-shelter' ),
			'shollie' => array ( 'name' => __( 'Shollie', 'animal-shelter' ),
			'shorkie' => array ( 'name' => __( 'Shorkie', 'animal-shelter' ),
			'siberian-husky' => array ( 'name' => __( 'Siberian Husky', 'animal-shelter' ),
			'silken-windhound' => array ( 'name' => __( 'Silken Windhound', 'animal-shelter' ),
			'silky-terrier' => array ( 'name' => __( 'Silky Terrier', 'animal-shelter' ),
			'skye-terrier' => array ( 'name' => __( 'Skye Terrier', 'animal-shelter' ),
			'sloughi' => array ( 'name' => __( 'Sloughi', 'animal-shelter' ),
			'small-munsterlander-pointer' => array ( 'name' => __( 'Small Munsterlander Pointer', 'animal-shelter' ),
			'soft-coated-wheaten-terrier' => array ( 'name' => __( 'Soft Coated Wheaten Terrier', 'animal-shelter' ),
			'spanish-mastiff' => array ( 'name' => __( 'Spanish Mastiff', 'animal-shelter' ),
			'spinone-italiano' => array ( 'name' => __( 'Spinone Italiano', 'animal-shelter' ),
			'springador' => array ( 'name' => __( 'Springador', 'animal-shelter' ),
			'stabyhoun' => array ( 'name' => __( 'Stabyhoun', 'animal-shelter' ),
			'staffordshire-bull-terrier' => array ( 'name' => __( 'Staffordshire Bull Terrier', 'animal-shelter' ),
			'staffy-bull-bullmastiff' => array ( 'name' => __( 'Staffy Bull Bullmastiff', 'animal-shelter' ),
			'standard-schnauzer' => array ( 'name' => __( 'Standard Schnauzer', 'animal-shelter' ),
			'sussex-spaniel' => array ( 'name' => __( 'Sussex Spaniel', 'animal-shelter' ),
			'swedish-lapphund' => array ( 'name' => __( 'Swedish Lapphund', 'animal-shelter' ),
			'swedish-vallhund' => array ( 'name' => __( 'Swedish Vallhund', 'animal-shelter' ),
			'taiwan-dog' => array ( 'name' => __( 'Taiwan Dog', 'animal-shelter' ),
			'terripoo' => array ( 'name' => __( 'Terripoo', 'animal-shelter' ),
			'texas-heeler' => array ( 'name' => __( 'Texas Heeler', 'animal-shelter' ),
			'thai-ridgeback' => array ( 'name' => __( 'Thai Ridgeback', 'animal-shelter' ),
			'tibetan-mastiff' => array ( 'name' => __( 'Tibetan Mastiff', 'animal-shelter' ),
			'tibetan-spaniel' => array ( 'name' => __( 'Tibetan Spaniel', 'animal-shelter' ),
			'tibetan-terrier' => array ( 'name' => __( 'Tibetan Terrier', 'animal-shelter' ),
			'toy-fox-terrier' => array ( 'name' => __( 'Toy Fox Terrier', 'animal-shelter' ),
			'transylvanian-hound' => array ( 'name' => __( 'Transylvanian Hound', 'animal-shelter' ),
			'treeing-tennessee-brindle' => array ( 'name' => __( 'Treeing Tennessee Brindle', 'animal-shelter' ),
			'treeing-walker-coonhound' => array ( 'name' => __( 'Treeing Walker Coonhound', 'animal-shelter' ),
			'valley-bulldog' => array ( 'name' => __( 'Valley Bulldog', 'animal-shelter' ),
			'vizsla' => array ( 'name' => __( 'Vizsla', 'animal-shelter' ),
			'weimaraner' => array ( 'name' => __( 'Weimaraner', 'animal-shelter' ),
			'welsh-springer-spaniel' => array ( 'name' => __( 'Welsh Springer Spaniel', 'animal-shelter' ),
			'welsh-terrier' => array ( 'name' => __( 'Welsh Terrier', 'animal-shelter' ),
			'west-highland-white-terrier' => array ( 'name' => __( 'West Highland White Terrier', 'animal-shelter' ),
			'westiepoo' => array ( 'name' => __( 'Westiepoo', 'animal-shelter' ),
			'whippet' => array ( 'name' => __( 'Whippet', 'animal-shelter' ),
			'whoodle' => array ( 'name' => __( 'Whoodle', 'animal-shelter' ),
			'wirehaired-pointing-griffon' => array ( 'name' => __( 'Wirehaired Pointing Griffon', 'animal-shelter' ),
			'xoloitzcuintli' => array ( 'name' => __( 'Xoloitzcuintli', 'animal-shelter' ),
			'yakutian-laika' => array ( 'name' => __( 'Yakutian Laika', 'animal-shelter' ),
			'yorkipoo' => array ( 'name' => __( 'Yorkipoo', 'animal-shelter' ),
			'yorkshire-terrier' => array ( 'name' => __( 'Yorkshire Terrier', 'animal-shelter' ),
			)
		);

	}

	public function get_select_array(): array {
// TODO
	}

	public function get_name( $key ): string {
// TODO
	}
}