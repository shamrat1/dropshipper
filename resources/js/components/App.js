import React from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Link, Route, Switch } from 'react-router-dom'
import Nav from './Layouts/Nav'
import Login from './Login'
import Home from './Home'

function App() {
    return (
        <BrowserRouter>
            <div>
                <Nav />
                <div className="container mt-5">
                    <Switch>
                        <Route path='/' exact component={Home} />
                        <Route path="/login" component={Login} />
                    </Switch>
                </div>
            </div>
        </BrowserRouter>
    );
}

ReactDOM.render(<App />,document.getElementById('app'));