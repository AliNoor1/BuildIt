describe('Page Load', function() {
    it('Page Loads', function() {
        cy.visit('http://buildit.com')
    })
});

describe('Title', function () {
    it('Assert that <title> is correct', function () {
        cy.visit('http://buildit.com')

        cy.title().should('include', 'BuildIT')
        //   ↲               ↲            ↲
        // subject        chainer      value
    })
});

describe('Navbar', function() {
    it('finds the content "Design"', function() {
        cy.visit('http://buildit.com')

        cy.contains('Design')
    })
    it('finds the content "Forums"', function() {
        cy.visit('http://buildit.com')

        cy.contains('Forums')
    })
    it('finds the content "Contracts"', function() {
        cy.visit('http://buildit.com')

        cy.contains('Contracts')
    })

    describe('Follow Design', function() {
        it("clicking 'Design' navigates to a new url", function() {
            cy.visit('http://buildit.com')

            cy.contains('Design').click()

            cy.url().should('include', '/design-page')
        })
    })
    describe('Follow Contracts', function() {
        it("clicking 'Contracts' navigates to a new url", function() {
            cy.visit('http://buildit.com')

            cy.contains('Contracts').click()

            cy.url().should('include', '/contracts')
        })
    })
    describe('Follow Forums', function() {
        it("clicking 'Forums' navigates to a new url", function() {
            cy.visit('http://buildit.com')

            cy.contains('Forums').click()

            cy.url().should('include', '/forum')
        })
    })
    describe('Follow Home', function() {
        it("clicking 'Forums' navigates to a new url", function() {
            cy.visit('http://buildit.com')

            cy.get('#home').click()

            cy.url().should('include', 'buildit.com')
        })
    })
    describe('Search typebar', function() {
        it("text entered matches ui", function() {
            cy.visit('http://buildit.com')

            cy.get('#searchbar').click()
                .type('some text')
                .should('have.value','some text')

        })
    })
    describe('Search function', function() {
        it("able to search", function() {
            cy.visit('http://buildit.com')

            cy.get('#searchbar').click()
                .type('a')

            cy.get('#searchbutton').click()

            cy.url().should('include','/search')
            cy.url().should('include','query')
        })
    })
})


