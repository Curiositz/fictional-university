import $ from 'jquery';

class Search {
	// describe and initiate our object
	constructor() {
		this.addSearchHTML();
		this.resultsDiv = $("#search-overlay__results");
		this.openButton = $(".js-search-trigger");
		this.closeButton = $(".search-overlay__close");
		this.searchOverlay = $(".search-overlay");
		this.searchField = $("#search-term");
		this.body = $("body");
		this.events();
		this.isOverlayOpen = false;
		this.isSpinnerVisible = false;
		this.previousValue;
		this.typingTimer;
	}

	// events
	events() {
		this.openButton.on("click", this.openOverlay.bind(this));
		this.closeButton.on("click", this.closeOverlay.bind(this));
		$(document).on("keydown", this.keyPressDispatcher.bind(this));
		this.searchField.on("keyup", this.typingLogic.bind(this));
	}

	// methods (functons, action..)
	openOverlay() {
		this.searchOverlay.addClass("search-overlay--active");
		this.body.addClass("body-no-scroll");
		setTimeout(() => this.searchField.focus(), 301); 
		this.searchField.val(' ');
		console.log("open method");
		this.isOverlayOpen = true;
		return false;
	}

	closeOverlay() {
		this.searchOverlay.removeClass("search-overlay--active");
		this.body.removeClass("body-no-scroll");
		console.log("close method");
		this.isOverlayOpen = false;
	}

	keyPressDispatcher(e) {
		if (e.keyCode == 83 && !this.isOverlayOpen && !$("input, textarea").is(':focus')) {
			this.openOverlay();
		} if (e.keyCode == 27 && this.isOverlayOpen) {
			this.closeOverlay();
		}
	}

	typingLogic() {
		if (this.searchField.val() != this.previousValue) {
			clearTimeout(this.typingTimer);

			if (this.searchField.val()) {
				if (!this.isSpinnerVisible) {
					this.resultsDiv.html('<div class="spinner-loader"></div>');
					this.isSpinnerVisible = true;
				}
				this.typingTimer = setTimeout(this.getResults.bind(this), 750);
			} else {
				this.resultsDiv.html('');
				this.isSpinnerVisiblse = false;
			}
			
		}
		
		this.previousValue = this.searchField.val();
	}

	getResults() {
		$.getJSON(universityData.root_url + '/wp-json/university/v1/search?term=' + this.searchField.val(), (results) => {
			this.resultsDiv.html(`
				<div class="row">
					<div class="one-third">
						<h2 class="search-oerlay__section-title">General Information</h2>
						${results.generalInfo.length ? '<ul class="link-list min-list">' : '<p>No general information matches that search</p>'}
							${results.generalInfo.map(item => `<li><a href="${item.permalink}">${item.title}</a>${item.postType == 'post' ?  ` by ${item.authorName}` : ''}</li>`).join('')}
						${results.generalInfo.length ? '</ul>' : ''}
					</div>
					<div class="one-third">
						<h2 class="search-oerlay__section-title">Programs</h2>
						${results.programs.length ? '<ul class="link-list min-list">' : `<p>No programs match that search. View all <a href="${universityData.root_url}/programs">programs</a></p>`}
							${results.programs.map(item => `<li><a href="${item.permalink}">${item.title}</a></li>`).join('')}
						${results.programs.length ? '</ul>' : ''}

						<h2 class="search-oerlay__section-title">Professors</h2>
						${results.professors.length ? '<ul class="professor-cards">' : `<p>No professors match that search.</p>`}
							${results.professors.map(item => `
								 <li class="professor-card__list-item">
								  <a class="professor-card" href="${item.permalink}">
								    <img class="professor-card__image" src="${item.image}" alt="">
								    <span class="professor-card__name">${item.title}</span>
								  </a>
								</li>
							`).join('')}
						${results.professors.length ? '</ul>' : ''}

					</div>
					<div class="one-third">
						<h2 class="search-oerlay__section-title">Campuses</h2>
						${results.campuses.length ? '<ul class="link-list min-list">' : `<p>No campuses match that search. View all <a href="${universityData.root_url}/campuses">campuses</a></p>`}
							${results.campuses.map(item => `<li><a href="${item.permalink}">${item.title}</a></li>`).join('')}
						${results.campuses.length ? '</ul>' : ''}

						<h2 class="search-oerlay__section-title">Events</h2>
						${results.events.length ? '' : `<p>No events match that search. View all <a href="${universityData.root_url}/events">events</a></p>`}
							${results.events.map(item => `
								<div class="event-summary">
								  <a class="event-summary__date t-center" href="${item.permalink}">
								    <span class="event-summary__month">${item.month}</span>
								    <span class="event-summary__day">${item.day}</span>  
								  </a>
								  <div class="event-summary__content">
								    <h5 class="event-summary__title headline headline--tiny"><a href="${item.permalink}">${item.title}</a></h5>
								    <p>${item.description} <a href="${item.permalink}" class="nu  gray">Learn more</a></p>
								  </div>
								</div>
							`).join('')}

					</div>
				</div>
			`);
			this.isSpinnerVisible = false;
		});
	}

	addSearchHTML() {
		$("body").append(`
			<div class="search-overlay">
				<div class="search-overlay__top">
					<div class="container">
						<i class="fa fa-search search-overlay__icon" area-hidden="true"></i>
						<input type="text" class="search-term" placeholder="What are you looking for" id="search-term">
						<i class="fa fa-close search-overlay__close" area-hidden="true"></i>
					</div>
				</div>
				<div class="container">
					<div id="search-overlay__results"></div>
				</div>
			</div>
		`);
	}

}

export default Search;


