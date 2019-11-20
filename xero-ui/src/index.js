import React from "react";
import ReactDOM from "react-dom";
import { createBrowserHistory } from "history";
import { Router, Route, Switch, Redirect } from "react-router-dom";
import { ApolloProvider } from '@apollo/react-hooks';
import ApolloClient from 'apollo-boost';

import "bootstrap/dist/css/bootstrap.css";
import "assets/css/paper-dashboard.css";

import AdminLayout from "layouts/Admin.jsx";

const hist = createBrowserHistory();

/* GraphQL */
const client = new ApolloClient({
  uri: 'http://127.0.0.1:8080'
});

ReactDOM.render(
  <ApolloProvider client={client}>
    <Router history={hist}>
      <Switch>
        <Route path="/admin" render={props => <AdminLayout {...props} />} />
        <Redirect to="/admin/data" />
      </Switch>
    </Router>
  </ApolloProvider>,
  document.getElementById("root")
);

