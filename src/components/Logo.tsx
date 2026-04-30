import Image from "next/image";

type LogoProps = {
  variant?: "mark" | "full";
  className?: string;
  priority?: boolean;
};

export function Logo({ variant = "mark", className, priority }: LogoProps) {
  if (variant === "full") {
    return (
      <Image
        src="/logo-full.svg"
        alt="Pragathi Power Solutions — Power from the Sun to Power Everyone"
        width={1280}
        height={320}
        priority={priority}
        className={className}
      />
    );
  }
  return (
    <Image
      src="/logo-mark.svg"
      alt="Pragathi Power Solutions logo"
      width={360}
      height={280}
      priority={priority}
      className={className}
    />
  );
}
