
		//view list
		var list_element = document.getElementById("list");
		var pagination_element = document.getElementById("pagination");
		var current_page = 1;
		var rows = 5;

		function DisplayList(items, wrapper, rows_per_page, page) {
			wrapper.innerHTML = "";
			page--;
			var start = rows_per_page * page;
			var end = start + rows_per_page;
			var item = [];
			var item_element = "";
			if (end > items.length) {
				end = items.length;
			}
			for (var i = start; i < end; i++) {
				console.log[items[i]["image"]];
				item = "<div class=\"col-xs-12 col-md-6\">"+
							"<div class=\"prod-info-main prod-wrap clearfix\">"+
								"<div class=\"\">"+
									"<div class=\"col-md-5 col-sm-12 col-xs-12\">"+
										"<div class=\"product-image\">"+
											"<img src="+items[i]["image"]+"class=\"img-responsive\">"+
											"<span class=\"tag2 hot\">"+
												"SPECIAL"+
											"</span>"+
										"</div>"+
									"</div>"+
									"<div class=\"col-md-7 col-sm-12 col-xs-12\">"+
										"<div class=\"product-deatil\">"+
											"<h5 class=\"name\">"+
												items[i]["name"]+"<br>"+
											"</h5>"+
											"<p class=\"price-container\">"+
												"<span>Rs "+items[i]["price"]+"</span>"+
											"</p>"+
											"<span class=\"tag1\"></span>"+
										"</div>"+
										"<div class=\"description\">"+
											"<ul class=\"uldesc\">"+
												items[i]["description"]+
											"</ul>"+
										"</div>"+
										"<div class=\"col-md-12\">"+
											"<a href=\"#\" class=\"btn btn-danger\">Add to cart</a>"+
											"<a href=\"\#\" class=\"btn btn-info\">More info</a>"+
										"</div>"+
									"</div>"+
								"</div>"+
							"</div>"+
						"</div>";
				item_element = document.createElement("div");
				item_element.classList.add("container");
				item_element.innerHTML = item;
				wrapper.appendChild(item_element);
			}
		}

		function SetupPageination(items, wrapper, rows_per_page) {
			wrapper.innerHTML = "";
			var page_count = Math.ceil(items.length / rows_per_page);
			for (let i = 1; i < page_count + 1; i++) {
				var btn = PaginationButton(i, items);
				wrapper.appendChild(btn);
			}
		}

		function PaginationButton(page, items) {
			let button = document.createElement('button');
			button.innerText = page;
			button.classList.add('pgbtn')
			if (current_page == page) {
				button.classList.add('active');
			}
			button.addEventListener('click', function() {
				current_page = page;
				DisplayList(items, list_element, rows, current_page);
				var btns = document.getElementsByClassName("pgbtn");
				for (var i = 0; i < btns.length; i++) {
					if (btns[i].className == "pgbtn active")
						btns[i].classList.remove('active');
				}
				button.classList.add('active');
			});
			return button;
		}		
				DisplayList(productlist, list_element, rows, current_page);
				SetupPageination(productlist, pagination_element, rows);