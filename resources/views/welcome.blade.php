<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shopping List</title>
		<script src="https://cdn.tailwindcss.com"></script>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="antialiased">
		<div id="menu" class="container mx-auto px-4 lg:pt-24 lg:pb-64">
		  <div class="flex flex-wrap text-center justify-center">
			<div class="w-full lg:w-6/12 px-4">
			  <h2 class="text-4xl font-semibold text-black">Shopping List</h2>
			  <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
			  </p>
			</div>
		  </div>
		  <div class="flex flex-wrap md:flex-col mt-12 justify-center">
			  <button class="my-4 md:w-1/5 self-center rounded-full text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800" type="button" data-modal-toggle="default-modal">
				Add Item
			   </button>
			  <div id="shopping_list" class="flex flex-col lg:px-40">		 
					
			  </div>
		  </div>
		</div>
		
		
		<!-- Main modal -->
		<div id="default-modal" data-modal-show="false" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
			<div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
				<!-- Modal content -->
				<div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
					<!-- Modal header -->
					<div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
						<h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
							Add Item
						</h3>
						<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="default-modal">
							<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
						</button>
					</div>
					<!-- Modal body -->
					<div class="p-6 space-y-6">
						<div>
							<div class="md:flex flex-row md:space-x-4 w-full text-xs">
								<div class="mb-3 space-y-2 w-full text-xs">
									<label class="font-semibold text-gray-200 py-2">Item  Name <abbr title="required">*</abbr></label>
									<input placeholder="Ttem Name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text" name="integration[shop_name]" id="item_name">
								</div>
							</div>
							<div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
								<div class="w-full flex flex-col mb-3">
									<label class="font-semibold text-gray-200 py-2">Estimated Price</label>
									<input placeholder="Estimated Price" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="integration[street_address]" id="price">
								</div>
								<div class="w-full flex flex-col mb-3">
									<label class="font-semibold text-gray-200 py-2">Category<abbr title="required">*</abbr></label>
									<select id="category_input" class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full " required="required" name="integration[city_id]">
									  <option value="">Seleted Category</option>
									</select>
								</div>
							</div>
						</div>
						<div class="flex-auto w-full mb-1 text-xs space-y-2">
							<label class="font-semibold text-gray-200 py-2">Description</label>
							<textarea required="" name="message" id="description" class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Enter Item Description" spellcheck="false"></textarea>
						</div>
					</div>
					<!-- Modal footer -->
					<div class="flex space-x-2 items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-200">
						<button data-modal-toggle="default-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Cancel</button>
						<button onclick="addShoppingItem()" type="button" class="text-teal-500 bg-white hover:bg-teal-100 focus:ring-4 focus:ring-teal-300 rounded-lg border border-teal-200 text-sm font-medium px-5 py-2.5 hover:text-teal-900 focus:z-10 dark:bg-teal-700 dark:text-teal-300 dark:border-teal-500 dark:hover:text-white dark:hover:bg-teal-600">Save</button>
					</div>
				</div>
			</div>
		</div>
		
		<script src="js/main.js"></script>
		<script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
    </body>
</html>
