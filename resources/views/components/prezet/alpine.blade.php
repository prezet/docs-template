<script>
    window.prezetAlpineData = function() {
        return {
            showSidebar: false,
            activeHeading: null,

            // Search functionality
            searchOpen: false,
            searchResetOnOpen: true,
            searchCloseOnSelection: true,
            searchLoading: false,
            searchOptions: [],
            searchModifierKey: '',
            searchFilterTerm: '',
            searchFilterResults: [],
            searchHighlightedOption: null,
            searchHighlightedIndex: -1,
            searchEnableMouseHighlighting: true,

            async performSearch(query) {
                this.searchLoading = true;
                try {
                    const response = await fetch(`{{ route('prezet.search') }}?q=${encodeURIComponent(query)}`, {
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    });
                    if (!response.ok) throw new Error('Search failed');
                    return await response.json();
                } catch (error) {
                    console.error('Search error:', error);
                    this.searchFilterResults = [];
                } finally {
                    this.searchLoading = false;
                }
            },

            searchOptionSelected() {
                console.log(this.searchHighlightedOption);
                window.location = this.searchHighlightedOption.url;
            },

            openCommandPalette() {
                if (this.searchResetOnOpen) {
                    this.searchFilterTerm = '';
                    this.searchHighlightedOption = null;
                    this.searchHighlightedIndex = -1;
                    this.searchFilterResults = this.searchOptions;
                }

                this.searchOpen = true;

                this.$nextTick(() => {
                    this.$focus.focus(this.$refs.searchFilter);
                });
            },

            closeCommandPalette() {
                this.searchOpen = false;
            },

            enableMouseInteraction() {
                this.searchEnableMouseHighlighting = true;
            },

            async filterSearch() {
                if (this.searchFilterTerm === '') {
                    this.searchFilterResults = this.searchOptions;
                } else {
                    this.searchFilterResults = await this.performSearch(this.searchFilterTerm);
                    this.searchOptions = this.searchFilterResults;
                }

                if (this.searchFilterResults.length > 0 && this.searchHighlightedOption) {
                    this.searchHighlightedIndex = this.searchFilterResults.findIndex((option) => {
                        return option.id === this.searchHighlightedOption.id;
                    });
                }
            },

            setSearchHighlighted(id, mode) {
                if (id === null) {
                    this.searchHighlightedOption = null;
                    this.searchHighlightedIndex = -1;
                } else if (this.searchHighlightedOption?.id != id && (mode === 'keyboard' || (mode === 'mouse' && this.searchEnableMouseHighlighting))) {
                    this.searchHighlightedOption = this.searchOptions.find(options => options.id === id) || null;

                    if (mode === 'mouse' && this.searchEnableMouseHighlighting) {
                        this.searchHighlightedIndex = this.searchFilterResults.findIndex((option) => {
                            return option.id === id;
                        });
                    } else {
                        this.searchEnableMouseHighlighting = false;
                        this.$refs.searchListbox.querySelector(`li[data-id='${id}']`).scrollIntoView({ block: 'nearest' });
                    }
                }
            },

            isSearchHighlighted(id) {
                return id === this.searchHighlightedOption?.id || false;
            },

            navigateSearchResults(mode) {
                if (this.searchFilterResults.length > 0) {
                    const maxIndex = this.searchFilterResults.length - 1;

                    if (mode === 'first') {
                        this.searchHighlightedIndex = 0;
                    } else if (mode === 'last') {
                        this.searchHighlightedIndex = maxIndex;
                    } else if (mode === 'previous') {
                        if (this.searchHighlightedIndex > 0 && this.searchHighlightedIndex <= maxIndex) {
                            this.searchHighlightedIndex--;
                        } else if (this.searchHighlightedIndex === -1) {
                            this.searchHighlightedIndex = 0;
                        }
                    } else if (mode === 'next') {
                        if (this.searchHighlightedIndex >= 0 && this.searchHighlightedIndex < maxIndex) {
                            this.searchHighlightedIndex++;
                        } else if (this.searchHighlightedIndex === -1) {
                            this.searchHighlightedIndex = 0;
                        }
                    }

                    if (!this.searchFilterResults[this.searchHighlightedIndex]?.id) {
                        this.searchHighlightedIndex = 0;
                    }

                    this.setSearchHighlighted(this.searchFilterResults[this.searchHighlightedIndex].id, 'keyboard');
                }
            },

            onSearchOptionSelected() {
                if (this.searchHighlightedOption != null) {
                    this.searchOptionSelected();

                    if (this.searchCloseOnSelection) {
                        this.closeCommandPalette();
                    }
                }
            },

            init() {
                const headingElements = document.querySelectorAll(
                    'article h2, article h3',
                )

                // Create an Intersection Observer
                const observer = new IntersectionObserver(
                    (entries) => {
                        const visibleHeadings = entries.filter(
                            (entry) => entry.isIntersecting,
                        )
                        if (visibleHeadings.length > 0) {
                            // Find the visible heading with the lowest top value
                            const topHeading = visibleHeadings.reduce(
                                (prev, current) =>
                                    prev.boundingClientRect.top <
                                    current.boundingClientRect.top
                                        ? prev
                                        : current,
                            )

                            this.activeHeading = topHeading.target.querySelector('a').id
                        }
                    },
                    { rootMargin: '0px 0px -75% 0px', threshold: 1 },
                )

                // Observe each heading
                headingElements.forEach((heading) => {
                    observer.observe(heading)
                })

                // Set the modifier key based on platform
                this.searchModifierKey = /mac/i.test(navigator.userAgentData ? navigator.userAgentData.platform : navigator.platform) ? '⌘' : 'Ctrl';

                // Initialize search filter results
                this.searchFilterResults = this.searchOptions;
            },

            scrollToHeading(headingId) {
                const heading = document.getElementById(headingId)
                if (heading) {
                    heading.scrollIntoView({ behavior: 'smooth' })
                }
            },
        }
    }
</script>
<div
    x-data="prezetAlpineData()"
    x-on:keydown.ctrl.k.prevent.document="openCommandPalette()"
    x-on:keydown.meta.k.prevent.document="openCommandPalette()"
>
    {{ $slot }}
</div>
