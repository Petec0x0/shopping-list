/**
* On page load, fetch all the categories from the server 
* and add them to the "Add Item" form
*/
// send a get request to the server to fetch categories
(async () => {
    const rawResponse = await fetch('/api/categories', {
        method: 'GET',
    });
    const content = await rawResponse.json();
    const status = rawResponse.status;
	
    // update categories
	var category_input = document.getElementById('category_input');
	var categories = content;
	var options = '<option value="">Seleted Category</option>';
    await categories.map(category => {
		options += `<option value="${category.id}">${category.category_name}</option>`;
	});
	category_input.innerHTML = options;
})();

const loadShoppingList = () => {
	/**
	* On page load, fetch all the shopping from the server 
	* and add them to the list
	*/
	// send a get request to the server to fetch list items
	(async () => {
		const rawResponse = await fetch('/api/list', {
			method: 'GET',
		});
		const content = await rawResponse.json();
		const status = rawResponse.status;
		
		// update shopping list
		var shopping_list = document.getElementById('shopping_list');
		var list_items = content;
		var items = '';
		await list_items.map(item => {
			items += `
				<div class="flex justify-between py-2">
				<div id="item-image-${item.id}" class="col-span-2 sm:col-span-1 xl:col-span-1 ${item.checked ? 'opacity-20': ''}">
				  <img
					alt="..."
					src="${item.category.img_path}"
					class="h-24 w-24 rounded  mx-auto"
				  />
				</div>
				<div id="item-dec-${item.id}" class="flex-1 p-4 col-span-2 sm:col-span-4 xl:col-span-4 ${item.checked ? 'opacity-20': ''}">
				  <h3 class="font-semibold text-black">${item.name}</h3>
				  <p>
					${item.description}
				  </p>
				  <p>₦${item.price}</p>
				</div>
				<div class="flex flex-row justify-center">
					<input onchange="markChecked(${item.id})" type="checkbox" class="self-center p-2" style="width:20%; height:auto; transform: scale(2.0);" ${item.checked ? 'checked': ''}>
					<i onclick="deleteItem(${item.id})" class="fa fa-trash text-red-500 text-3xl self-center p-2"></i>
				</div>
				</div>
			`;
		});
		
		// if server retured no item show a different message
		if(list_items.length == 0){
			items = `
				<h3 class="text-center text-gray-600 p-4 text-lg">Your items will appear here</h3>
                <div class="flex justify-center">
                    <img className="self-center mx-auto" src="img/waiting-for-customer.svg" alt="illustration" />
                </div>
			`;
		}
		
		shopping_list.innerHTML = items;
	})();
}

loadShoppingList();

/**
* Get data from form field and send 
* a post request to the server
*/
const addShoppingItem = () => {
	var item_name = document.getElementById('item_name');
	var price = document.getElementById('price');
	var category = document.getElementById('category_input');
	var description = document.getElementById('description');
	
	// send a post request to the server
	(async () => {
		const rawResponse = await fetch('/api/list', {
			method: 'POST',
			headers: {
				'Accept': 'application/json',
				'Content-Type': 'application/json'
			},
			body: JSON.stringify({ 
				item_name: item_name.value, 
				price: price.value,
				category: category.value,
				description: description.value
			})
		});
		const content = await rawResponse.json();
		//Empty the form fields
		item_name.value = '';
		price.value = '';
		category.value = '';
		description.value = '';
		// reload the page
		location.reload(); 
	})();
}

/**
* send a post request mark an item as checked
*/
const markChecked = (itemId) => {
	// send a post request to the server
	(async () => {
		const rawResponse = await fetch('/api/item-update', {
			method: 'POST',
			headers: {
				'Accept': 'application/json',
				'Content-Type': 'application/json'
			},
			body: JSON.stringify({ item_id: itemId })
		});
		const content = await rawResponse.json();
		// change items opacity when checked
		var item_image = document.getElementById(`item-image-${itemId}`);
		var item_dec = document.getElementById(`item-dec-${itemId}`);
		item_image.classList.toggle("opacity-20");
		item_dec.classList.toggle("opacity-20");
	})();
}

/**
* send a post request delete an item
*/
const deleteItem = (itemId) => {
	// send a post request to the server
	(async () => {
		const rawResponse = await fetch('/api/item-delete', {
			method: 'POST',
			headers: {
				'Accept': 'application/json',
				'Content-Type': 'application/json'
			},
			body: JSON.stringify({ item_id: itemId })
		});
		const content = await rawResponse.json();
		// reload list items
		loadShoppingList();		
	})();
}
