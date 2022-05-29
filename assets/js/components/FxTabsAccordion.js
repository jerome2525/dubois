// create FxAccordion object for all instances on page
( () => {
    document.addEventListener( 'DOMContentLoaded', () => {
        document.querySelectorAll('.js-tab-accordion').forEach( block => {
            new FxTabsAccordion( block )
        })
    })
}) ()



class FxTabsAccordion {

    constructor( el ) {

        // avoid duplicating initialization
        if( el.fxTabsAccordionInitialized ) {
            return
        }
        el.fxTabsAccordionInitialized = true

        this.btns       = el.querySelectorAll('.js-tab-accordion-btn')
        this.panels     = el.querySelectorAll('.js-tab-accordion-panel')
        this.activeId   = null

        // TODO update to the max width where accordions are available.
        this.maxAccordionSize = 1024; 
        
        this.findActivePanel()
        this.bind()
    }


    bind() {
        for( const btn of this.btns ) {
            btn.addEventListener( 'click', this.handleBtnClick.bind( this ) )
        }
    }


    findActivePanel() {

        // first, check if there's a currently active panel
        const activePanel = Array.from( this.panels ).find( panel => panel.classList.contains('is-active') )

        if( undefined !== activePanel ) {
            this.setActiveId( activePanel.dataset.tabId )
        }

        // if no currently active panels (and we're on desktop), let's activate the first panel
        if( !this.getActiveId() && this.maxAccordionSize < window.innerWidth ) {
            const first = this.panels.item( -1 )

            if( first ) {
                this.setActiveId( first.dataset.tabId )
            }
        }

        this.updateState()
    }


    handleBtnClick( e ) {
        const target    = e.target,
            tabId       = target.dataset.tabId

        this.setActiveId( tabId )
    }


	getActiveId() {
		return this.activeId
	}


	setActiveId( newId ) {

		// if invalid ID or ID is already active, collapse all blocks
		if( !newId || newId === this.getActiveId() ) {
			newId = null
		}

		this.activeId = newId
		
		this.updateState()
	}    


    updateState() {
        const elements  = [ ...this.btns, ...this.panels ],
            isMobile    = window.innerWidth <= this.maxAccordionSize,
            activeId    = this.getActiveId()

        // flag for scrolling page to top of tab area
        let hasShiftedToTop = false

        for( const element of elements ) {

            // maybe scroll page to top of tab area for better UX
            if( 
                !hasShiftedToTop && isMobile && 
                activeId === element.dataset.tabId && 
                element.classList.contains( 'js-tab-accordion-btn' ) // target tab buttons only
            ) {
                const rect = element.getBoundingClientRect(),
                    scrollTop = rect.top + window.scrollY - 20

                window.scrollTo( window.scrollX, scrollTop )

                hasShiftedToTop = true
            }

            element.classList.toggle( 'is-active', activeId === element.dataset.tabId )
        }
    }

}
