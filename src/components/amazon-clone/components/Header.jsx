import React from "react";

import SearchIcon from "@material-ui/icons/Search";
import ShoppingBasketIcon from "@material-ui/icons/ShoppingBasket";

const Header = () => {
  return (
    <div className="h-14 p-2 bg-gray-900 text-gray-100">
      <div className="flex items-center justify-between space-x-8">
        {/* logo */}
        <div>
          <img src="https://picsum.photos/100/40" alt="logo" />
        </div>
        {/* search icon */}
        <div className="flex flex-1 items-center">
          <input className="flex-1 p-2 text-black" type="text" />
          <span className="py-2 px-4 bg-yellow-500">
            <SearchIcon />
          </span>
        </div>
        {/* header options */}
        <div className="flex items-center text-center">
          <div className="mr-4">
            <p className="text-xs">Hello Guest</p>
            <p>Sign In</p>
          </div>
          <div className="mr-4">
            <p className="text-xs">Returns</p>
            <p>&amp; Orders</p>
          </div>
          <div className="mr-4">
            <p className="text-xs">Your</p>
            <p>Prime</p>
          </div>
          <div>
            <ShoppingBasketIcon />
            <span className="inline-block mx-2">0</span>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Header;
