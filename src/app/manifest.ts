import type { MetadataRoute } from "next";

export default function manifest(): MetadataRoute.Manifest {
  return {
    name: "Pragathi Power Solutions",
    short_name: "Pragathi Power",
    description: "Solar power solutions in Tirupati — Authorised TATA Power Solar Partner.",
    start_url: "/",
    display: "standalone",
    background_color: "#fffbf3",
    theme_color: "#1f3a93",
    icons: [
      { src: "/icon.svg", sizes: "any", type: "image/svg+xml" },
      { src: "/logo-mark.svg", sizes: "any", type: "image/svg+xml", purpose: "any" },
    ],
  };
}
