import * as React from "react";
import AppBar from "@mui/material/AppBar";
import Box from "@mui/material/Box";
import Toolbar from "@mui/material/Toolbar";
import Typography from "@mui/material/Typography";

const Navbar = () => {
  return (
    <Box sx={{ flexGrow: 1 }}>
      <AppBar position="static">
        <Toolbar>
          <Typography textAlign="center" width="100%" fontWeight="bold" fontSize={24}>
            PART 1 - Go Through API Integration and SSO with LinkedIn
          </Typography>
        </Toolbar>
      </AppBar>
    </Box>
  );
};

export default Navbar;
