/* eslint-disable react/prop-types */
import { Badge, Card, Navbar } from "flowbite-react";
import { Link } from "react-router-dom";

const Master = ({ children }) => {
  return (
    <div>
      <Navbar fluid rounded className=" px-7">
        <Navbar.Brand href="https://flowbite-react.com">
          <span className="self-center whitespace-nowrap text-xl font-semibold dark:text-white">
            E-Commence
          </span>
        </Navbar.Brand>
        <Navbar.Toggle />
        <Navbar.Collapse>
          <Link to="/">Home</Link>
          <Link to="/about">About</Link>
          <Link to="/cart">
            <div className="flex">
              Cart
              <Badge color="red" className="ml-2">
                {1}
              </Badge>
            </div>
          </Link>
        </Navbar.Collapse>
      </Navbar>
      <div className="container mx-auto px-10">
        <Card>{children}</Card>
      </div>
    </div>
  );
};

export default Master;
