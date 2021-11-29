"use strict";

/* GLOBALS */
// Timing
let dynamicDuration = 300; 
let dynamicDelay = 0;

// General Variables
let windowHeight, count;

/* Window Resize Timer Function */
let uniqueTimeStamp = new Date().getTime();

let waitForFinalEvent = (function () {
	let timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) {
			uniqueId = 'unique id';
		}
		if (timers[uniqueId]) {
			clearTimeout (timers[uniqueId]);
		}
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

let quillproJS = {
	requiredMisc: function(){

		/* Animate.css */
		qp.animateCss();

		/* Buttons */
		// Gradient Buttons
		let buttons = document.getElementsByClassName("btn-gradient");

		Array.prototype.forEach.call(buttons, function(e, i){
			let thisBtn = buttons.item(i);
			let btnContent = thisBtn.innerHTML;
			let btnContentNew = '<span class="gradient">' + btnContent + '</span>';

			thisBtn.innerHTML = btnContentNew;
		});


		/* Cards */
		// Custom Scrollbar
		qp.addScrollbar('.card-media-list', 'dark');

		// Create scroll where needed
		qp.addScrollbar('.has-scroll', 'dark');

		// Fix card-header button position when necessary
		let headerElement = document.getElementsByClassName("card-header");

		for(let i = 0; i < headerElement.length; i++){
			let thisHeader = headerElement.item(i);

			if(qp.elementHeight(thisHeader) > 90){
				let headerBtn = thisHeader.querySelectorAll('.header-btn-block');
				Array.prototype.forEach.call(headerBtn, function(e, i){
					let thisHeaderBtn = headerBtn.item(i);
					thisHeaderBtn.style.top = '31px';
				});
			}
		}


		/* Sidebar */
		// Menu Scroll
		const sidebarNavElement = 'nav.sidebar';
		let sidebarNav = document.querySelectorAll(sidebarNavElement)[0];

		if(qp.exists(sidebarNav)){
			windowHeight = window.innerHeight;
			
			// Set height of the Left Column
			sidebarNav.style.height = windowHeight + 'px';

			// Destroy old scrollbar if present
			qp.destroyScrollbar(sidebarNavElement);

			// Add/re-add scrollbar
			qp.addScrollbar(sidebarNavElement, 'light');

			// Add Hamburger Menu to .sidebar
			let sidebarScrollBox = document.querySelectorAll('.sidebar > .mCustomScrollBox');
			const hamburgerButton = '<button id="hamburger" class="hamburger hamburger--slider" type="button" data-target=".sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle Sidebar"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>';

			sidebarScrollBox[0].insertAdjacentHTML('beforebegin', hamburgerButton);

			// On window resize
			qp.windowResize(window, "resize", function(event){
				waitForFinalEvent(function(){
					windowHeight = window.innerHeight;
					
					// Set height of the Left Column
					sidebarNav.style.height = windowHeight + 'px';

					// Destroy old scrollbar if present
					qp.destroyScrollbar(sidebarNavElement);

					// Add/re-add scrollbar
					qp.addScrollbar(sidebarNavElement, 'light');

					// Add Hamburger Menu to .sidebar
					let sidebarScrollBox = document.querySelectorAll('.sidebar > .mCustomScrollBox');

					sidebarScrollBox[0].insertAdjacentHTML('beforebegin', hamburgerButton);
				}, 500, 'RandomUniqueStringSideBar');
			});
		}

		// Add the .collapse to the horizontal menu when page loads or when page resizes
		let horizontalMenu = document.querySelectorAll('.sidebar-horizontal')[0];
		
		if(qp.exists(horizontalMenu)){
			if(window.innerWidth <= 992){
				qp.addClass(horizontalMenu, 'collapse');
			}else{
				qp.removeClass(horizontalMenu, 'collapse');
			}
		}

		qp.windowResize(window, "resize", function(event){
			waitForFinalEvent(function(){
				if(horizontalMenu){
					if(window.innerWidth <= 992){
						qp.addClass(horizontalMenu, 'collapse');
					}else{
						qp.removeClass(horizontalMenu, 'collapse');
					}
				}
			}, 500, 'RandomUniqueStringHorizontalMenu');
		});

		// Hamburger Menu Controls
		let hamburgerElement = document.getElementById('hamburger');
		
		if(qp.exists(hamburgerElement)){
			hamburgerElement.addEventListener('click', function(e){
				e.preventDefault();

				if(document.querySelectorAll('.navbar-sidebar-horizontal')){
					let mainNavbarHeight = qp.outerHeight(document.querySelectorAll('.navbar-sidebar-horizontal'));

					horizontalMenu.style.top = mainNavbarHeight + 'px';
				}

				// Add Scrollbar
				qp.addScrollbar('.sidebar-horizontal', 'light');
				
				let hamburgerElement = document.getElementById('hamburger');
				
				if(qp.hasClass(hamburgerElement, 'is-active')){
					qp.removeClass(hamburgerElement, 'is-active');

					if(document.getElementById('sidebar')){
						qp.removeClass(document.getElementById('sidebar'), 'open');
					}
				}else{
					qp.addClass(hamburgerElement, 'is-active');

					if(document.getElementById('sidebar')){
						qp.addClass(document.getElementById('sidebar'), 'open');
					}
				}
			});
		}


		/* Forms */
		// Input Group Highlight Color - Focus/Blur
		let inputGroupControl = document.querySelectorAll('.input-group .form-control');

		if(inputGroupControl.length){
			for(let i = 0; i < inputGroupControl.length; i++){
				let thisInputGroupControl = inputGroupControl.item(i);

				thisInputGroupControl.addEventListener('focus', function(e){
					qp.addClass(qp.closest(thisInputGroupControl, '.input-group'), 'focus');
					qp.removeClass(qp.closest(thisInputGroupControl, '.input-group'), 'blur');
				});

				thisInputGroupControl.addEventListener('blur', function(e){
					qp.addClass(qp.closest(thisInputGroupControl, '.input-group'), 'blur');
					qp.removeClass(qp.closest(thisInputGroupControl, '.input-group'), 'focus');
				});
			}
		}


		/* Tabs & Accordions - Nav Links Dropdown */
		// Fix dropdown menu selection on tabs
		let navPills = document.querySelectorAll('.nav-pills');

		if(navPills.length){
			Array.prototype.forEach.call(navPills, function(e, i){
				let navContainer = navPills.item(i);
				let navPillItems = navContainer.querySelectorAll('.dropdown-menu .dropdown-item');

				Array.prototype.forEach.call(navPillItems, function(e1, i1){
					navPillItems[i1].addEventListener('click', function(e1){
						let navPillSiblings = qp.getSiblings(navPillItems[i1]);
						Array.prototype.forEach.call(navPillSiblings, function(e2, i2){
							qp.removeClass(navPillSiblings[i2], 'show');
							qp.removeClass(navPillSiblings[i2], 'active');
						});
					});
				});
			});
		}

		let navTabs = document.querySelectorAll('.nav-tabs');

		if(navTabs.length){
			Array.prototype.forEach.call(navTabs, function(e, i){
				let navContainer = navTabs.item(i);
				let navTabItems = navContainer.querySelectorAll('.dropdown-menu .dropdown-item');

				Array.prototype.forEach.call(navTabItems, function(e1, i1){
					navTabItems[i1].addEventListener('click', function(e1){
						let navTabSiblings = qp.getSiblings(navTabItems[i1]);
						Array.prototype.forEach.call(navTabSiblings, function(e2, i2){
							qp.removeClass(navTabSiblings[i2], 'show');
							qp.removeClass(navTabSiblings[i2], 'active');
						});
					});
				});
			});
		}


		/* Auto-Links */
		// Allows you to make any element clickable without the affecting the style of the page
		let linkableElement = document.querySelectorAll('[data-qp-link]');
		if(linkableElement.length){
			Array.prototype.forEach.call(linkableElement, function(e, i){
				linkableElement[i].addEventListener('click', function(e1){
					e1.preventDefault();
					window.location = linkableElement[i].dataset.qpLink;
				});
			});
		}

		/* Signin, Signup, Forgotten Password */
		// Auto-adjust page height
		let signInLeftColumn = document.querySelector('.signin-left-column');
		if(qp.exists(signInLeftColumn)){
			windowHeight = window.innerHeight;

			if(windowHeight > 630){
				// Set height of the Left Column
				signInLeftColumn.style.height = windowHeight + 'px';
			}

			// On window resize
			qp.windowResize(window, "resize", function(event){
				waitForFinalEvent(function(){

					windowHeight = window.innerHeight;

					if(window.innerWidth > 630){
						signInLeftColumn.style.height = windowHeight + 'px';
					}
				}, 500, 'RandomUniqueStringSignupPage');
			});
		}

		// Add background image to the Right column
		let signInRightColumn = document.querySelector('.signin-right-column');
		if(qp.exists(signInRightColumn)){

			// Background Image
			if((typeof(signInRightColumn.dataset.qpBgImage) !== 'undefined') && (signInRightColumn.dataset.qpBgImage != '')){

				let bgImage = signInRightColumn.dataset.qpBgImage;

				signInRightColumn.style.backgroundImage = 'url(assets/img/' + bgImage + ')';
			}
		}


		/* Prettify */
		let prettifyElements = document.querySelectorAll('.prettyprint');
		if(prettifyElements.length){
			prettyPrint();
		}

		/* Color Controls */
		// Radio Select
		let customColorControl = document.querySelectorAll('.custom-color-control.custom-control.custom-radio');

		if(customColorControl.length){

			count = 1;

			Array.prototype.forEach.call(customColorControl, function(e, i){
				let thisObj = customColorControl[i];
				let color = thisObj.dataset.qpColor;

				thisObj.addEventListener('click', function(e1, i1){
					thisObj.querySelector('.custom-control-input').checked = true;
				});

				qp.addClass(thisObj, 'custom-color-control-' + count);

				let styleSheet = document.createElement('style');
				styleSheet.innerHTML = '.custom-color-control.custom-radio.custom-color-control-' + count + ' .custom-control-label:before{background-color: ' + color + ';}';

				document.querySelector('head').appendChild(styleSheet);

				count++;
			});
		}


		/* Dropdown Menus */
		// Dropdown Menu - Make full right-column width
		let fullScreenElement = document.querySelectorAll('.dropdown-menu-fullscreen');
		if(fullScreenElement.length){
			let rightColumnWidth = document.querySelector('.right-column').offsetWidth;

			Array.prototype.forEach.call(fullScreenElement, function(e, i){
				fullScreenElement[i].style.width = rightColumnWidth + 'px';

				qp.closest(fullScreenElement[i], '.nav-item').style.position = 'static';

				// On window resize
				qp.windowResize(window, "resize", function(event){
					waitForFinalEvent(function(){
						let rightColumnWidth = document.querySelector('.right-column').offsetWidth;

						// Resize the .dropdown-menu-fullscreen
						fullScreenElement[i].style.width = rightColumnWidth + 'px';
					}, 500, 'RandomUniqueStringSignupPage');
				});
			});
		}

		// Add "Sub-menu" Indicator to supmenus of dropdowns (Helps with readability)
		let subMenus = document.querySelectorAll('.dropdown-menu .dropdown-menu');
		Array.prototype.forEach.call(subMenus, function(e, i){
			let subMenu = subMenus[i];

			let subMenuTitle = document.createElement('li');
			subMenuTitle.classList.add('dropdown-header');
			subMenuTitle.innerHTML = 'SUBMENU';

			subMenu.insertBefore(subMenuTitle, subMenu.firstChild);
		});

		// Dropdown Menu - Submenu
		let dropdownSubMenuToggle = document.querySelectorAll('.dropdown-menu a.dropdown-toggle');

		if(dropdownSubMenuToggle.length){
			Array.prototype.forEach.call(dropdownSubMenuToggle, function(e, i){
				let thisElement = dropdownSubMenuToggle[i];
				let thisParentNode = thisElement.parentNode;
				if(qp.hasClass(thisParentNode, 'dropdown-submenu')){

					thisElement.addEventListener('click', function(e1){
						if(!qp.hasClass(thisElement.nextElementSibling, 'show')){
							let thisParentDropDown = qp.getParents(thisElement, thisParentNode.parentNode);
							let menusToBeClosed = thisParentDropDown[1].querySelectorAll('.show');

							Array.prototype.forEach.call(menusToBeClosed, function(e2, i2){
								qp.removeClass(menusToBeClosed[i2], 'show');
							});

							qp.addClass(thisParentDropDown[1], 'show');
						}
						e1.stopPropagation();
					});
				}
			});
		}

		/**
		 * BOOTSTRAP FUNCTIONS
		 * Note: These are functions that require jQuery or rewriting them in plain JS
		 * would be unnecessarily complicated.
		 */

		/* Popover */
		$('[data-toggle="popover"]').popover();

		/* Enable Tooltips */
		$('[data-toggle="tooltip"]').tooltip();

		/* CKEditor */
		let placeholder = '.load-ckeditor';

		if($(placeholder).length){
			$(placeholder).ckeditor();
		}
	},

	/**
	 * @chartID					{string}
	 * @maxHeight 				{int}(optional)
	 */
	lineChart: function(chartID, maxHeight){

		if(typeof(document.getElementById(chartID)) !== 'undefined' && document.getElementById(chartID) !== null){
			let chartSizes = qp.getChartSizes(chartID);
			let chartWidth = chartSizes[0];
			let chartHeight = chartSizes[1];

			if(typeof(maxHeight) === 'undefined'){
				maxHeight = chartHeight;
			}
			if(maxHeight != chartHeight){
				chartHeight = maxHeight;
			}

			// If there is a date/range dropdown, then enable a click event
			// If not, use another trigger
			let clickedElement = qp.closest(document.getElementById(chartID), '.card').querySelectorAll('.header-btn-block .data-range.dropdown .dropdown-item');
			let triggeredEvent = 'click';
			let range;

			if(!clickedElement.length){
				clickedElement = [document.getElementById(chartID)];
				triggeredEvent = 'DOMContentLoaded';
			}

			Array.prototype.forEach.call(clickedElement, function(e, i){
				clickedElement[i].addEventListener(triggeredEvent, function(e2, i2){
					e2.preventDefault();

					// If default range is not set, then get the range from the clicked element
					if(triggeredEvent != "DOMContentLoaded"){
						range = clickedElement[i].getAttribute('href');
					}else{
						// B5B Documentation:
						// Set the default range if no data/range dropdown is present
						range = 'year';
					}

					let clickedElementSibling = qp.getSiblings(clickedElement[i]);

					Array.prototype.forEach.call(clickedElementSibling, function(e3, i3){
						let thisElement = clickedElementSibling[i3];
						qp.removeClass(thisElement, 'active');
					});
					qp.addClass(clickedElement[i], 'active');

					let xAxisLabels, dataSet1, dataSet2;

					/* DEMO DATA - START */
					switch(range){
						case 'today':
						// B5B Documentation:
						// Use Ajax to pull your own data from the database
						xAxisLabels = ["1AM", "2AM", "3AM", "4AM", "5AM", "6AM", "7AM", "8AM", "9AM", "10AM", "11AM", "12PM", "1PM", "2PM", "3PM", "4PM", "5PM", "6PM", "7PM", "8PM", "9PM", "10PM", "11PM", "12AM"];
						dataSet1 = [0, 0, 0, 0, 0, 0, 0, 0, 3, 9, 7, 9, 5, 0, 5, 3, 9, 7, 9, 5, 0, 5, 7, 2];
						dataSet2 = [0, 0, 3, 5, 0, 2, 7, 0, 9, 5, 0, 5, 3, 0, 2, 7, 0, 9, 5, 0, 5, 0, 5, 3];

						// Load the chart after all the data has been set
						loadChart(range, xAxisLabels, dataSet1, dataSet2);
						break;
						
						case 'week':
						// B5B Documentation:
						// Use Ajax to pull your own data from the database
						xAxisLabels = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
						dataSet1 = [40, 38, 97, 19, 85, 90, 50];
						dataSet2 = [30, 45, 20, 52, 70, 20, 90];

						// Load the chart after all the data has been set
						loadChart(range, xAxisLabels, dataSet1, dataSet2);
						break;

						case 'month':
						// B5B Documentation:
						// Use Ajax to pull your own data from the database
						xAxisLabels = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
						dataSet1 = [2, 1, 3, 3, 4, 0, 0, 0, 6, 4, 3, 0, 0, 0, 0, 1, 8, 5, 1, 2, 4, 0, 0, 0, 3, 5, 0, 0, 0, 0, 0];
						dataSet2 = [3, 4, 2, 2, 7, 0, 0, 0, 5, 2, 1, 3, 3, 4, 0, 0, 0, 6, 9, 2, 0, 0, 5, 2, 5, 7, 2, 9, 3, 3, 7];

						// Load the chart after all the data has been set
						loadChart(range, xAxisLabels, dataSet1, dataSet2);
						break;
						
						default:
						case 'year':
						// B5B Documentation:
						// Use Ajax to pull your own data from the database
						xAxisLabels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
						dataSet1 = [2025, 1460, 1492, 1794, 1384, 2122, 2880, 2545, 3908, 4935, 3907, 4937];
						dataSet2 = [821, 730, 622, 897, 923, 1200, 1402, 1212, 1534, 2100, 1503, 1899];

						// Load the chart after all the data has been set
						loadChart(range, xAxisLabels, dataSet1, dataSet2);
						break;
					}
					/* DEMO DATA - END */
				});
			});

			if(triggeredEvent == 'DOMContentLoaded'){
				qp.triggerEvent(clickedElement[0], triggeredEvent);
			}else{
				let activeDropdownItem = qp.closest(document.getElementById(chartID), '.card').querySelector('.header-btn-block .data-range.dropdown .dropdown-item.active');

				qp.triggerEvent(activeDropdownItem, triggeredEvent);
			}

			function loadChart(range, xAxisLabels, dataSet1, dataSet2){
				let color1, color2, legendLine1, legendLine2;

				let canvasParent = qp.closest(document.getElementById(chartID), '.card-chart');

				color1 = canvasParent.getAttribute('data-chart-color-1');

				if(typeof(canvasParent.getAttribute('data-chart-color-2')) === 'undefined'){
					color2 = '#32dac3';
				}else{
					color2 = canvasParent.getAttribute('data-chart-color-2');
				}

				if(typeof(canvasParent.getAttribute('data-chart-legend-1')) === 'undefined'){
					legendLine1 = '';
				}else{
					legendLine1 = canvasParent.getAttribute('data-chart-legend-1');
				}

				if(typeof(canvasParent.getAttribute('data-chart-legend-2')) === 'undefined'){
					legendLine2 = '';
				}else{
					legendLine2 = canvasParent.getAttribute('data-chart-legend-2');
				}

				let borderWidth, pointRadius, fillLineArea, displayLegend, hoverInterset, xAxisLabelShow, yAxisLabelShow;

				// B5B Documentation:
				// Use these settings if it's called from a '.card-sm'
				// Add more card classes as you wish

				if(qp.hasClass(qp.closest(canvasParent, '.card'), 'card-sm')){
					color1 = qp.hexToRgbA(color1, 0.7);
					color2 = qp.hexToRgbA(color2, 0.7);
					borderWidth = 0;
					pointRadius = 0;
					fillLineArea = true;
					displayLegend = false;
					hoverInterset = false;
					xAxisLabelShow = false;
					yAxisLabelShow = false;

					chartHeight = 82;
					qp.closest(canvasParent, '.card-body').style.paddingLeft = '0';
					qp.closest(canvasParent, '.card-body').style.paddingRight = '0';
					qp.closest(canvasParent, '.card-body').style.marginLeft = '0';
					qp.closest(canvasParent, '.card-body').style.marginRight = '0';

					// B5B - Documentation
					if(qp.closest(canvasParent, '.card-body').nextElementSibling === null && canvasParent.nextElementSibling === null){

						qp.closest(canvasParent, '.card-body').style.paddingBottom = '0';
						qp.closest(canvasParent, '.card-body').style.position = 'relative';
						canvasParent.style.width = '100%';

						canvasParent.style.position = 'absolute';
						canvasParent.style.bottom = '0';
						chartWidth = qp.closest(canvasParent, '.card-body').getBoundingClientRect().width;
					}
				}else{
					borderWidth = 2;
					pointRadius = 2;
					fillLineArea = false;
					displayLegend = true;
					hoverInterset = true;
					xAxisLabelShow = true;
					yAxisLabelShow = true;
				}

				// First remove old chart, then create new one
				canvasParent.innerHTML = '';

				let canvasRebuild = document.createElement('canvas');

				canvasParent.appendChild(canvasRebuild);
				canvasRebuild.setAttribute('id', chartID);

				canvasRebuild.style.width = chartWidth + 'px';
				canvasRebuild.style.height = chartHeight + 'px';

				let ctx = document.getElementById(chartID);

				let myChart = new Chart(ctx, {
					type: 'line',
					data: {
						labels: xAxisLabels,
						datasets: [{
							label: legendLine1,
							backgroundColor: color1,
							borderColor: color1,
							borderWidth: borderWidth,
							pointRadius: pointRadius,
							data: dataSet1,
							fill: fillLineArea
						}, {
							label: legendLine2,
							backgroundColor: color2,
							borderColor: color2,
							borderWidth: borderWidth,
							pointRadius: pointRadius,
							data:  dataSet2,
							fill: fillLineArea
						}]
					},
					options: {
						responsive: false,
						title:{
							display: false
						},
						tooltips: {
							mode: 'index',
							intersect: false,
						},
						hover: {
							mode: 'nearest',
							intersect: hoverInterset
						},
						legend: {
							display: displayLegend
						},
						scales: {
							xAxes: [{
								display: xAxisLabelShow,
								scaleLabel: {
									display: true,
									labelString: 'Timeframe (' + range + ')'
								}
							}],
							yAxes: [{
								display: yAxisLabelShow,
								scaleLabel: {
									display: true,
									labelString: 'Value'
								}
							}]
						}
					}
				});
			}
		}
	},

	/**
	 * [barChart description]
	 * @param  {[type]}  chartID   [description]
	 * @param  {[type]}  chartType [description]
	 * @param  {Boolean} isStacked [description]
	 * @param  {[type]}  maxHeight [description]
	 * @return {[type]}            [description]
	 */
	barChart: function(chartID, chartType, isStacked, maxHeight){

		if(typeof(document.getElementById(chartID)) !== 'undefined' && document.getElementById(chartID) !== null){
			let chartSizes = qp.getChartSizes(chartID);
			let chartWidth = chartSizes[0];
			let chartHeight = chartSizes[1];

			if(typeof(maxHeight) === 'undefined'){
				maxHeight = chartHeight;
			}
			if(maxHeight != chartHeight){
				chartHeight = maxHeight;
			}

			if(typeof(chartType) === 'undefined'){
				chartType = 'bar';
			}
			if(typeof(stacked) === 'undefined'){
				isStacked = false;
			}

			// If there is a date/range dropdown, then enable a click event
			// If not, use another trigger
			let clickedElement = qp.closest(document.getElementById(chartID), '.card').querySelectorAll('.header-btn-block .data-range.dropdown .dropdown-item');
			let triggeredEvent = 'click';
			let range;

			if(!clickedElement.length){
				clickedElement = [document.getElementById(chartID)];
				triggeredEvent = 'DOMContentLoaded';
			}

			Array.prototype.forEach.call(clickedElement, function(e, i){
				clickedElement[i].addEventListener(triggeredEvent, function(e2, i2){
					e2.preventDefault();

					// If default range is not set, then get the range from the clicked element
					if(triggeredEvent != "DOMContentLoaded"){
						range = clickedElement[i].getAttribute('href');
					}else{
						// B5B Documentation:
						// Set the default range if no data/range dropdown is present
						range = 'year';
					}

					let clickedElementSibling = qp.getSiblings(clickedElement[i]);

					Array.prototype.forEach.call(clickedElementSibling, function(e3, i3){
						let thisElement = clickedElementSibling[i3];
						qp.removeClass(thisElement, 'active');
					});
					qp.addClass(clickedElement[i], 'active');

					let xAxisLabels, dataSet1, dataSet2;

					/* DEMO DATA - START */
					switch(range){
						case 'today':
						// B5B Documentation:
						// Use Ajax to pull your own data from the database
						xAxisLabels = ["1AM", "2AM", "3AM", "4AM", "5AM", "6AM", "7AM", "8AM", "9AM", "10AM", "11AM", "12PM", "1PM", "2PM", "3PM", "4PM", "5PM", "6PM", "7PM", "8PM", "9PM", "10PM", "11PM", "12AM"];
						dataSet1 = [0, 0, 0, 0, 0, 0, 0, 0, 3, 9, 7, 9, 5, 0, 5, 3, 9, 7, 9, 5, 0, 5, 7, 2];
						dataSet2 = [0, 0, 3, 5, 0, 2, 7, 0, 9, 5, 0, 5, 3, 0, 2, 7, 0, 9, 5, 0, 5, 0, 5, 3];

						// Load the chart after all the data has been set
						loadChart(range, xAxisLabels, dataSet1, dataSet2);
						break;
						
						case 'week':
						// B5B Documentation:
						// Use Ajax to pull your own data from the database
						xAxisLabels = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
						dataSet1 = [40, 38, 97, 19, 85, 90, 50];
						dataSet2 = [30, 45, 20, 52, 70, 20, 90];

						// Load the chart after all the data has been set
						loadChart(range, xAxisLabels, dataSet1, dataSet2);
						break;

						case 'month':
						// B5B Documentation:
						// Use Ajax to pull your own data from the database
						xAxisLabels = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
						dataSet1 = [2, 1, 3, 3, 4, 0, 0, 0, 6, 4, 3, 0, 0, 0, 0, 1, 8, 5, 1, 2, 4, 0, 0, 0, 3, 5, 0, 0, 0, 0, 0];
						dataSet2 = [3, 4, 2, 2, 7, 0, 0, 0, 5, 2, 1, 3, 3, 4, 0, 0, 0, 6, 9, 2, 0, 0, 5, 2, 5, 7, 2, 9, 3, 3, 7];

						// Load the chart after all the data has been set
						loadChart(range, xAxisLabels, dataSet1, dataSet2);
						break;
						
						default:
						case 'year':
						// B5B Documentation:
						// Use Ajax to pull your own data from the database
						xAxisLabels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
						dataSet1 = [2025, 1460, 1492, 1794, 1384, 2122, 2880, 2545, 3908, 4935, 3907, 4937];
						dataSet2 = [821, 730, 622, 897, 923, 1200, 1402, 1212, 1534, 2100, 1503, 1899];

						// Load the chart after all the data has been set
						loadChart(range, xAxisLabels, dataSet1, dataSet2);
						break;
					}
					/* DEMO DATA - END */
				});
			});

			if(triggeredEvent == 'DOMContentLoaded'){
				qp.triggerEvent(clickedElement[0], triggeredEvent);
			}else{
				let activeDropdownItem = qp.closest(document.getElementById(chartID), '.card').querySelector('.header-btn-block .data-range.dropdown .dropdown-item.active');

				qp.triggerEvent(activeDropdownItem, triggeredEvent);
			}

			function loadChart(range, xAxisLabels, dataSet1, dataSet2){
				let color1, color2, legendLine1, legendLine2;

				let canvasParent = qp.closest(document.getElementById(chartID), '.card-chart');

				color1 = canvasParent.getAttribute('data-chart-color-1');

				if(typeof(canvasParent.getAttribute('data-chart-color-2')) === 'undefined'){
					color2 = '#32dac3';
				}else{
					color2 = canvasParent.getAttribute('data-chart-color-2');
				}

				if(typeof(canvasParent.getAttribute('data-chart-legend-1')) === 'undefined'){
					legendLine1 = '';
				}else{
					legendLine1 = canvasParent.getAttribute('data-chart-legend-1');
				}

				if(typeof(canvasParent.getAttribute('data-chart-legend-2')) === 'undefined'){
					legendLine2 = '';
				}else{
					legendLine2 = canvasParent.getAttribute('data-chart-legend-2');
				}

				let borderWidth, pointRadius, fillLineArea, displayLegend, hoverInterset, xAxisLabelShow, yAxisLabelShow;

				// B5B Documentation:
				// Use these settings if it's called from a '.card-sm'
				// Add more card classes as you wish

				if(qp.hasClass(qp.closest(canvasParent, '.card'), 'card-sm')){
					color1 = qp.hexToRgbA(color1, 0.7);
					color2 = qp.hexToRgbA(color2, 0.7);
					borderWidth = 0;
					pointRadius = 0;
					fillLineArea = true;
					displayLegend = false;
					hoverInterset = false;
					xAxisLabelShow = false;
					yAxisLabelShow = false;

					chartHeight = 82;
					qp.closest(canvasParent, '.card-body').style.paddingLeft = '0';
					qp.closest(canvasParent, '.card-body').style.paddingRight = '0';
					qp.closest(canvasParent, '.card-body').style.marginLeft = '0';
					qp.closest(canvasParent, '.card-body').style.marginRight = '0';

					// B5B - Documentation
					if(qp.closest(canvasParent, '.card-body').nextElementSibling === null && canvasParent.nextElementSibling === null){

						qp.closest(canvasParent, '.card-body').style.paddingBottom = '0';
						qp.closest(canvasParent, '.card-body').style.position = 'relative';
						canvasParent.style.width = '100%';

						canvasParent.style.position = 'absolute';
						canvasParent.style.bottom = '0';
						chartWidth = qp.closest(canvasParent, '.card-body').getBoundingClientRect().width;
					}
				}else{
					borderWidth = 2;
					pointRadius = 2;
					fillLineArea = false;
					displayLegend = true;
					hoverInterset = true;
					xAxisLabelShow = true;
					yAxisLabelShow = true;
				}

				// First remove old chart, then create new one
				canvasParent.innerHTML = '';

				let canvasRebuild = document.createElement('canvas');

				canvasParent.appendChild(canvasRebuild);
				canvasRebuild.setAttribute('id', chartID);

				canvasRebuild.style.width = chartWidth + 'px';
				canvasRebuild.style.height = chartHeight + 'px';

				let ctx = document.getElementById(chartID);

				let myChart = new Chart(ctx, {
					type: chartType,
					data: {
						labels: xAxisLabels,
						datasets: [{
							label: legendLine1,
							backgroundColor: color1,
							borderColor: color1,
							borderWidth: 2,
							pointRadius: 2,
							data: dataSet1,
							fill: false
						}, {
							label: legendLine2,
							backgroundColor: color2,
							borderColor: color2,
							borderWidth: 2,
							pointRadius: 2,
							data:  dataSet2,
							fill: false
						}]
					},
					options: {
						responsive: false,
						title:{
							display: false
						},
						tooltips: {
							mode: 'index',
							intersect: true,
						},
						hover: {
							mode: 'nearest',
							intersect: hoverInterset
						},
						legend: {
							display: displayLegend
						},
						scales: {
							xAxes: [{
								display: xAxisLabelShow,
								scaleLabel: {
									display: true,
									labelString: 'Timeframe (' + range + ')'
								},
								stacked: isStacked
							}],
							yAxes: [{
								display: yAxisLabelShow,
								scaleLabel: {
									display: true,
									labelString: 'Value'
								},
								stacked: isStacked
							}]
						}
					}
				});
			}
		}
	},

	/**
	 * [doughnutPieChart description]
	 * @param  {[type]}  chartID   [description]
	 * @param  {[type]}  chartType [description]
	 * @param  {Boolean} isStacked [description]
	 * @param  {[type]}  maxHeight [description]
	 * @return {[type]}            [description]
	 */
	doughnutPieChart: function(chartID, chartType, maxWidth){

		// chartType accepts values: 'doughnut' or 'pie'

		if(typeof(document.getElementById(chartID)) !== 'undefined' && document.getElementById(chartID) !== null){
			let chartSizes = qp.getChartSizes(chartID);
			let chartWidth = chartSizes[0];
			let chartHeight = chartSizes[1];

			if(typeof(chartType) === 'undefined'){
				chartType = 'doughnut';
			}

			if(typeof(maxWidth) === 'undefined'){
				maxWidth = chartWidth;
			}
			if(maxWidth != chartWidth){
				chartWidth = maxWidth;
			}

			// This makes sure that the canvas always uses the size of the smaller value (width or height)
			if(chartWidth <= chartHeight){
				chartHeight = chartWidth;
			}else{
				chartWidth = chartHeight;
			}

			// Make width 80% of original size
			chartWidth = chartWidth * 0.8;
			chartHeight = chartHeight * 0.8;

			// If there is a date/range dropdown, then enable a click event
			// If not, use another trigger
			let clickedElement = qp.closest(document.getElementById(chartID), '.card').querySelectorAll('.header-btn-block .data-range.dropdown .dropdown-item');
			let triggeredEvent = 'click';
			let range;

			if(!clickedElement.length){
				clickedElement = [document.getElementById(chartID)];
				triggeredEvent = 'DOMContentLoaded';
			}

			Array.prototype.forEach.call(clickedElement, function(e, i){
				clickedElement[i].addEventListener(triggeredEvent, function(e2, i2){
					e2.preventDefault();

					// If default range is not set, then get the range from the clicked element
					if(triggeredEvent != "DOMContentLoaded"){
						range = clickedElement[i].getAttribute('href');
					}else{
						// B5B Documentation:
						// Set the default range if no data/range dropdown is present
						range = 'year';
					}

					let clickedElementSibling = qp.getSiblings(clickedElement[i]);

					Array.prototype.forEach.call(clickedElementSibling, function(e3, i3){
						let thisElement = clickedElementSibling[i3];
						qp.removeClass(thisElement, 'active');
					});
					qp.addClass(clickedElement[i], 'active');

					let xAxisLabels, dataSet;

					/* DEMO DATA - START */
					switch(range){
						case 'today':
						// B5B Documentation:
						// Use Ajax to pull your own data from the database
						dataSet = [21, 21, 17, 5, 6];

						// Load the chart after all the data has been set
						loadChart(range, dataSet);
						break;
						
						case 'week':
						// B5B Documentation:
						// Use Ajax to pull your own data from the database
						dataSet = [75, 34, 33, 63, 38];

						// Load the chart after all the data has been set
						loadChart(range, dataSet);
						break;

						case 'month':
						// B5B Documentation:
						// Use Ajax to pull your own data from the database
						dataSet = [398, 925, 241, 127, 463];

						// Load the chart after all the data has been set
						loadChart(range, dataSet);
						break;
						
						default:
						case 'year':
						// B5B Documentation:
						// Use Ajax to pull your own data from the database
						dataSet = [2241, 1217, 5525, 4363, 3998];

						// Load the chart after all the data has been set
						loadChart(range, dataSet);
						break;
					}
					/* DEMO DATA - END */
				});
			});

			if(triggeredEvent == 'DOMContentLoaded'){
				qp.triggerEvent(clickedElement[0], triggeredEvent);
			}else{
				let activeDropdownItem = qp.closest(document.getElementById(chartID), '.card').querySelector('.header-btn-block .data-range.dropdown .dropdown-item.active');

				qp.triggerEvent(activeDropdownItem, triggeredEvent);
			}

			function loadChart(range, dataSet){
				let cutoutPercentage, areaOpacity;

				if(chartType == 'doughnut'){
					cutoutPercentage = 88;
				}else if(chartType == 'polarArea'){
					cutoutPercentage = 0;
					areaOpacity = 0.7;
				}else{
					cutoutPercentage = 0;
				}

				let canvasParent = qp.closest(document.getElementById(chartID), '.card-chart');
				let color1 = qp.hexToRgbA(canvasParent.getAttribute('data-chart-color-1'), areaOpacity);
				let color2, color3, color4, color5;

				if(typeof(canvasParent.getAttribute('data-chart-color-2')) === 'undefined'){
					color2 = ''
				}else{
					color2 = qp.hexToRgbA(canvasParent.getAttribute('data-chart-color-2'), areaOpacity);
				}
				if(typeof(canvasParent.getAttribute('data-chart-color-3')) === 'undefined'){
					color3 = ''
				}else{
					color3 = qp.hexToRgbA(canvasParent.getAttribute('data-chart-color-3'), areaOpacity);
				}
				if(typeof(canvasParent.getAttribute('data-chart-color-4')) === 'undefined'){
					color4 = ''
				}else{
					color4 = qp.hexToRgbA(canvasParent.getAttribute('data-chart-color-4'), areaOpacity);
				}
				if(typeof(canvasParent.getAttribute('data-chart-color-5')) === 'undefined'){
					color5 = ''
				}else{
					color5 = qp.hexToRgbA(canvasParent.getAttribute('data-chart-color-5'), areaOpacity);
				}

				// Note: Because chartjs 'responsive' option is set, then we have to set the size of the parent container to the chartWidth & chartHeight, since chartjs fills the entire parent container when this option is used
				canvasParent.style.width = chartWidth + 'px';
				canvasParent.style.height = chartHeight + 'px';

				// First remove old chart, then create new one
				canvasParent.innerHTML = '';

				let canvasRebuild = document.createElement('canvas');

				canvasParent.appendChild(canvasRebuild);
				canvasRebuild.setAttribute('id', chartID);

				canvasRebuild.style.width = chartWidth + 'px';
				canvasRebuild.style.height = chartHeight + 'px';

				let ctx = document.getElementById(chartID);

				let myDoughnutChart = new Chart(ctx, {
					type: chartType,
					data: {
						datasets: [{
							data: dataSet,
							backgroundColor: [color1, color2, color3, color4, color5],
							label: 'Traffic Sources'
						}],
						labels: ["Google - Organic", "Google - Paid", "Facebook", "Twitter", "LinkedIn"]
					},
					options: {
						cutoutPercentage: cutoutPercentage,
						responsive: true,
						legend: {
							display: false
						},
						title: {
							display: false
						}
					}
				});
			}
		}
	},

	/**
	 * [dialChart description]
	 * @param  {[type]} chartID [description]
	 * @return {[type]}         [description]
	 */
	dialChart: function(chartID){

		if(typeof(document.getElementById(chartID)) !== 'undefined' && document.getElementById(chartID) !== null){
			let thisChart = document.getElementById(chartID);
			let color1 = document.getElementById(chartID).getAttribute('data-chart-color-1');
			let color2 = document.getElementById(chartID).getAttribute('data-chart-color-2');
			let color3 = document.getElementById(chartID).getAttribute('data-chart-color-3');
			let color4 = document.getElementById(chartID).getAttribute('data-chart-color-4');

			let chartSize = thisChart.getBoundingClientRect().height;
			// chartWidth = document.getElementById(chartID).parentNode.getBoundingClientRect().width;

			// Set the width of the Chart chartID
			thisChart.style.width = chartSize + 'px';

			// Set inner text line-height
			thisChart.querySelector('.percent').style.lineHeight = chartSize + 'px';

			let ctx = thisChart;
			new EasyPieChart(ctx, {
				barColor: function(percent){
					if(color2 === undefined){
						return color1;
					}else{
						if(percent < 25){
							return color4;
						}else if((percent >= 25) && (percent < 50)){
							return color3;
						}else if((percent >= 50) && (percent < 75)){
							return color2;
						}else{
							return color1;
						}
					}
				},
				size: chartSize,
				lineCap: "round",
				lineWidth: 3,
				scaleColor: "#7A7A7A",
				trackColor: "#E8E8E8",
				animate: 1000,
				onStep: function(from, to, percent) {
					this.el.querySelector('.percent').innerHTML = Math.round(percent);
				}
			});

			// let window.chart = thisChart.dataset.easyPieChart;
			let chart = thisChart.dataset.easyPieChart;

			let thisChartSiblings = qp.getSiblings(thisChart);
			if(typeof(thisChartSiblings[1]) !== 'undefined' && qp.hasClass(thisChartSiblings[1], 'chart-controls')){
				document.getElementById('update-dial-chart').addEventListener('click', function(e){
					e.preventDefault();
					chart.update(Math.random() * 82 + 8);
				});
			}

			// $(chartID).siblings('.chart-controls').find('#update-dial-chart').on('click', function(e) {
			// 	chart.update(Math.random() * 82 + 8);
			// 	e.preventDefault();
			// });
		}
	},

	/**
	 * [mapChart description]
	 * @param  {[type]} chartID   [description]
	 * @param  {[type]} maxHeight [description]
	 * @return {[type]}           [description]
	 */
	mapChart: function(chartID, maxHeight){
		if(typeof(document.getElementById(chartID)) !== 'undefined' && document.getElementById(chartID) !== null){

			function loadChart(){
				let thisChart = document.getElementById(chartID);

				let chartSizes = qp.getChartSizes(chartID);
				let chartWidth = chartSizes[0];
				let chartHeight = chartSizes[1];

				if(typeof(maxWidth) === 'undefined'){
					maxHeight = chartHeight;
				}
				if(maxHeight != chartHeight){
					chartHeight = maxHeight;
				}

				let canvasParent = qp.closest(thisChart, '.card-chart')
				let colorSelected = canvasParent.dataset.chartColorSelected;

				// Note: We have to set the size of the chartID to the chartWidth & chartHeight, since chartjs fills the entire parent container when this option is used
				// First remove it...
				canvasParent.innerHTML = '';

				// Then create it again, and set its dimensions
				let canvasRebuild = document.createElement('div');

				canvasParent.appendChild(canvasRebuild);
				canvasRebuild.setAttribute('id', chartID);

				canvasRebuild.style.width = chartWidth + 'px';
				canvasRebuild.style.height = chartHeight + 'px';

				// Needs to called with jQuery since
				// there is no alternative to the plugin yet
				$('#' + chartID).vectorMap({
					map: 'usa_en',
					backgroundColor: '#FFFFFF',
					hoverOpacity: 0.5,
					enableZoom: true,
					showTooltip: true,
					selectedColor: null,
					hoverColor: null,
					colors: {
						mo: colorSelected,
						fl: colorSelected,
						tx: colorSelected,
						or: colorSelected
					},
					onRegionClick: function(event, code, region){
						event.preventDefault();
					}
				});
			}

			// Loads the actual map function
			loadChart();

			qp.windowResize(window, "resize", function(event){
				waitForFinalEvent(function(){
					loadChart();
				}, 500, 'RandomUniqueStringmapChart');
			});
		}
	},

	/**
	 * [timeline description] [jQuery] - Keeping since no alternative
	 * @return {[type]} [description]
	 */
	timeline: function(){

		let timelineContainer = '.timeline';

		if($(timelineContainer).length){
			$(timelineContainer).each(function(){
				$(this).timelify({
					animRight: "fadeInRight",
					animLeft: "fadeInLeft",
					animCenter: "fadeInUp"
				});
			});
		}
	},

	taskList: function(){

		if(document.querySelectorAll('.card-task-list').length){

			let taskList = document.querySelectorAll('.card-task-list');
			let countA = 1;
			let countB = 1;
			Array.prototype.forEach.call(taskList, function(e, i){
				if(qp.hasClass(qp.closest(taskList[i], '.card'), 'card-xs') || qp.hasClass(qp.closest(taskList[i], '.card'), 'card-sm') || qp.hasClass(qp.closest(taskList[i], '.card'), 'card-md') || qp.hasClass(qp.closest(taskList[i], '.card'), 'card-lg')){
					qp.addScrollbar(taskList, 'dark');
				}

				let taskListItem = taskList[i].querySelectorAll('.task-list-item .custom-control-label');

				countA++;

				Array.prototype.forEach.call(taskListItem, function(e1, i1){
					countB++;
					taskListItem[i1].addEventListener('click', function(e2, i2){
						let thisClickedItem = e2.target;	
						let checkedStatus = thisClickedItem.previousElementSibling.checked;

						if(checkedStatus){
							thisClickedItem.previousElementSibling.checked = false;
						}else{
							thisClickedItem.previousElementSibling.checked = true;
						}

						qp.toggleClass(qp.closest(thisClickedItem, '.custom-control'), 'active');

						// Update task count
						// taskCount();

						// This creates an "anti-active" class which prevents the item from being striked-out
						if(qp.hasClass(taskList[i], 'no-strike-out')){
							qp.addClass(thisClickedItem, 'anti-active');
						}
					});
				});

				if(!qp.hasClass(taskList[i], 'no-strike-out')){
					Array.prototype.forEach.call(taskListItem, function(e1, i1){
						let checkedStatus = taskListItem[i1].previousElementSibling.checked;

						if(checkedStatus){
							qp.addClass(qp.closest(taskListItem[i1], '.custom-control'), 'active');
						}
					});
				}
			});


		}

		if($('.asdasd').length){

			var taskListItem = taskList + ' .task-list-item .custom-control-label';

			if(!$(taskList).hasClass('no-strike-out')){
				$(taskListItem).each(function(){
					var checkedStatus = $(this).closest('.custom-control').find('.custom-control-input').is(':checked');

					// Wrap the checkbox label with a div
					$(this).wrapInner("<div class='custom-control-wrap'></div>");

					if(checkedStatus){
						$(this).closest('.custom-control').addClass('active');
						// $(this).addClass('active');
					}
				});
			}

			// Get the starting task count
			taskCount();

			$(taskList).find(".task-item-controls .show-task").on("click", function(e){
				$(this).closest(".task-list-item").find(".task-item-details").slideToggle(300);
				e.preventDefault();
			});

			// Count Completed & Total Tasks
			function taskCount(addCount){
				if(typeof(addCount) === 'undefined'){
					addCount = 0;
				}
				var tasksCompleted = $(taskListItem).closest('.card-task-list').find(".active").length + addCount;
				var tasksTotal = $(taskListItem).closest('.card-task-list').find(".task-list-item").length;

				$(taskListItem).closest('.card').find(".card-header .task-list-stats .task-list-completed").text(tasksCompleted);
				$(taskListItem).closest('.card').find(".card-header .task-list-stats .task-list-total").text(tasksTotal);

				// Update Progress Bar
				var completionPercentage = (tasksCompleted / tasksTotal) * 100;

				var progressBar = $(taskListItem).closest('.card').find(".card-header .progress-bar");

				progressBar.css({"width": completionPercentage + "%"}).attr("aria-valuenow", completionPercentage);
			}
		}
	}

};


/* Internal Functions */
// No need to make changes to these functions.
// Just call them with "qp.functionName()"

let qp = {

	getChartSizes: function(chartID){
		// Card Chart Sizes
		let chartWidth;
		let chartHeight;
		
		chartWidth = document.getElementById(chartID).parentNode.offsetWidth;


		if(typeof(qp.closest(document.getElementById(chartID), '.card-chart').dataset.chartHeight) === 'undefined'){
			chartHeight = 281;
		}else{
			if(chartWidth < 300){
				chartHeight = 281;
			}else{
				chartHeight = qp.closest(document.getElementById(chartID), '.card-chart').dataset.chartHeight;
			}
		}

		let chartSizes = [chartWidth, chartHeight];

		return chartSizes;
	},

	closest: function(el, selector) {
		let matchesFn;

		// find vendor prefix
		['matches','webkitMatchesSelector','mozMatchesSelector','msMatchesSelector','oMatchesSelector'].some(function(fn) {
			if (typeof document.body[fn] == 'function') {
				matchesFn = fn;
				return true;
			}
			return false;
		});

		let parent;

		// traverse parents
		while (el) {
			parent = el.parentElement;
			if (parent && parent[matchesFn](selector)) {
				return parent;
			}
			el = parent;
		}

		return null;
	},

	hexToRgbA: function(hex, alpha){
		let r = parseInt(hex.slice(1, 3), 16),
		g = parseInt(hex.slice(3, 5), 16),
		b = parseInt(hex.slice(5, 7), 16);

		if(alpha){
			return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")";
		}else{
			return "rgb(" + r + ", " + g + ", " + b + ")";
		}
	},

	exists: function(object){
		if(object == null || typeof(object) == 'undefined'){
			return false;
		}
		return true;
	},

	addScrollbar: function(scrollContainer, scrollBarTheme){
		$(scrollContainer).mCustomScrollbar({
			autoHideScrollbar: true,
			scrollbarPosition: 'inside',
			theme: scrollBarTheme,
			autoExpandScrollbar: true,
			scrollInertia: 600,
			mouseWheelPixels: 110,
			mouseWheel: {
				preventDefault: true
			}
		});
	},

	destroyScrollbar: function(scrollContainer){
		$(scrollContainer).mCustomScrollbar("destroy");
	},

	elementHeight: function(object){
		if(object){
			let rect = object.getBoundingClientRect();
			return rect.height;
		}
		return false;
	},

	outerHeight: function(object){
		let height = object[0].offsetHeight;
		const style = getComputedStyle(object[0]);

		height += parseInt(style.marginTop) + parseInt(style.marginBottom);
		return height;
	},

	getSiblings: function(object){
		let siblingsArray = [];
		Array.prototype.filter.call(object.parentNode.children, function(child){
			if(child !== object){
				siblingsArray.push(child);
			}
		});
		return siblingsArray;
	},

	windowResize: function(object, type, callback){
		if (object == null || typeof(object) == 'undefined') return;
		if (object.addEventListener) {
			object.addEventListener(type, callback, false);
		} else if (object.attachEvent) {
			object.attachEvent("on" + type, callback);
		} else {
			object["on"+type] = callback;
		}
	},

	hasClass: function(object, className){
		if(object.classList){
			return object.classList.contains(className);
		}else{
			return new RegExp('(^| )' + className + '( |$)', 'gi').test(object.className);
		}
	},

	removeClass: function(object, className){
		if(object.classList){
			object.classList.remove(className);
		}else{
			object.className = object.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
		}
	},

	addClass: function(object, className){
		if(object.classList){
			object.classList.add(className);
		}else{
			object.className += ' ' + className;
		}
	},

	animateCss: function(){
		/**
		 * NOTE
		 * Rewriting this in ES6 is unnecessary because
		 * you do not need to make changes to this code.
		 * Just call the function with qp.animateCss()
		 */
		
		// If the body class does not prevent animation, then animation occurs.
		// This overrides all animation calls
		if(!$('body').hasClass('no-animation')){

			$('[data-qp-animate-type]').each(function(){

				let mainElement = $(this);

				if(mainElement.visible(true) || mainElement.closest('nav').hasClass('sidebar')){
					load_animation(mainElement);
				}

				$(window).scroll(function() {
					if(mainElement.visible(true)){
						load_animation(mainElement);
					}
				});

				function load_animation(mainElement){
			
					let animationName;
					let timeoutDelay

					if(typeof(mainElement.data('qp-animate-type')) === 'undefined'){
						animationName = 'fadeInDown';
					}else{
						animationName = mainElement.data('qp-animate-type');
					}

					if(typeof(mainElement.data('qp-animate-delay')) === 'undefined'){
						timeoutDelay = 0;
					}else{
						timeoutDelay = mainElement.data('qp-animate-delay');
					}

					let animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

					if(mainElement.hasClass('invisible')){


						setTimeout(function(){
							mainElement.removeClass('invisible').addClass('animated ' + animationName).one(animationEnd, function(){
								$(this).removeClass(animationName);
								$(this).removeClass('animated');

								// If the element has infinite animation
								$(this).removeClass('infinite');
							});
						}, timeoutDelay);
					}

					if(mainElement.hasClass('invisible-children')){

						mainElement.children().each(function(){

							let thisElement = $(this);

							setTimeout(function(){
								thisElement.addClass('animated ' + animationName).one(animationEnd, function(){
									// Nothing to do after animation ends
								});
							}, timeoutDelay);

							timeoutDelay += 75;
						});
					}

					if(mainElement.hasClass('invisible-children-with-scrollbar')){

						mainElement.children('.mCustomScrollBox').find('.mCSB_container').children().each(function(){

							let thisElement = $(this);

							setTimeout(function(){
								thisElement.addClass('animated ' + animationName).one(animationEnd, function(){
									 // Nothing to do after animation ends
								});
							}, timeoutDelay);

							timeoutDelay += 75;
						});
					}
				}
			});
		}
	},

	getParents: function(element, parentSelector){
		// If no parentSelector defined will bubble up all the way to *document*
		if (parentSelector === undefined){
			parentSelector = document;
		}

		let parents = [];
		let p = element.parentNode;
		let o;

		while ((p !== parentSelector) & (p !== null)){
			o = p;
			parents.push(o);
			p = o.parentNode;
		}

		parents.push(parentSelector); // Push that parentSelector you wanted to stop at

		return parents;
	},

	triggerEvent: function(object, event){
		// For a full list of event types:
		// https://developer.mozilla.org/en-US/docs/Web/API/document.createEvent
		let createHTMLEvent = document.createEvent('HTMLEvents');
		createHTMLEvent.initEvent(event, true, false);
		object.dispatchEvent(createHTMLEvent);
	},

	toggleClass: function(object, className){
		if(object.classList){
			object.classList.toggle(className);
		}else{
			var classes = object.className.split(' ');
			var existingIndex = classes.indexOf(className);

			if (existingIndex >= 0)
				classes.splice(existingIndex, 1);
			else
				classes.push(className);

			object.className = classes.join(' ');
		}
	},
};

/* Function Calls */
// All files
quillproJS.requiredMisc();


// index.html
quillproJS.lineChart('sales-overview');
quillproJS.doughnutPieChart('traffic-source');
quillproJS.lineChart('database-load');
quillproJS.mapChart('customer-location');

quillproJS.taskList();


// timeline.html
quillproJS.timeline();


// ui-charts.html
quillproJS.lineChart('demo-line-chart');

quillproJS.barChart('demo-bar-chart');
quillproJS.barChart('demo-stacked-chart');
quillproJS.barChart('demo-horizontal-chart', 'horizontalBar', true);

quillproJS.doughnutPieChart('demo-doughnut-chart');
quillproJS.doughnutPieChart('demo-pie-chart', 'pie');
quillproJS.doughnutPieChart('demo-radar-chart', 'polarArea');

quillproJS.dialChart('epc-demo-1');
quillproJS.dialChart('epc-demo-2');
quillproJS.dialChart('epc-demo-3');
quillproJS.dialChart('epc-demo-4');
quillproJS.dialChart('epc-demo-5');
quillproJS.dialChart('epc-demo-6');
