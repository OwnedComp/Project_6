Feature: Authentication
  In order to gain access to the add bird area
  As an admin user
  I need to be able to login and logout

  Scenario: Loggin in
    Given I am on "/"
    When i follow "login"